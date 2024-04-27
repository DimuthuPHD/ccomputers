<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    public $productRepository;
    public $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productRepository->paginate();
        return view('admin.product.index', ['products' => $products,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepository->getParents();
        return view('admin.product.create')->withCategories($categories)->withModel(null);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $data = $request->validated();
            $product = $this->productRepository->create($data);
            if($request->has('images')){
                foreach ($request->images as $key => $image) {
                   $product->addMedia($image)->toMediaCollection('product-images');
                }
            }
            $categoryIds = Arr::get($data, 'categories', []);
            $product->categories()->sync($categoryIds);

            return to_route('admin.products.index')->with(['success' => 'Product created successfully ! ']);
        } catch (\Throwable $th) {
            logger()->log('error', $th);
            return back()->with(['error' => 'Product creating faild.  please try again!']);
        }
        abort(404);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->getParents();
        return view('admin.product.edit')->withModel($product)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        try {
            $data = $request->validated();

            $product->update($data);
            if($request->has('images')){
                foreach ($request->images as $key => $image) {
                   $product->addMedia($image)->toMediaCollection('product-images');
                }
            }

            $categoryIds = Arr::get($data, 'categories', []);
            $product->categories()->sync($categoryIds);
            return to_route('admin.products.index')->with(['success' => 'Product updated successfully ! ']);
        } catch (\Throwable $th) {
            logger()->log('error', $th);
            return back()->with(['error' => 'Product updating faild.  please try again!']);
        }
        abort(404);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->categories()->detach();
            $product->delete();
            return to_route('admin.products.index')->with(['success' => 'Product deleted successfully ! ']);
        } catch (\Throwable $th) {
            dd($th);
            logger()->log('error', $th);
            return back()->with(['error' => 'Product deleting faild.  please try again!']);
        }
        abort(404);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function removeMedia(Product $product, Media $media)
    {
        try {
            $product->deleteMedia($media->id);
            return back()->with(['success' => 'Media deleted successfully ! ']);
        } catch (\Throwable $th) {
            dd($th);
            logger()->log('error', $th);
            return back()->with(['error' => 'Media deleting faild.  please try again!']);
        }
        abort(404);
    }
}
