<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public $productRepository;
    public $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }


    public function index(Request $request){

        if(!count($request->all())){
            abort(404);
        }


        $products = $this->productRepository->filter(array_filter($request->all()));
        return view('frontend.store.index', ['products' =>$products, 'categories' => $this->categoryRepository->getParents()]);
    }


    public function show(Product $product){
        $categories = $this->categoryRepository->getParents();
        return view('frontend.store.single', ['product' =>$product, 'categories' => $categories, ]);
    }
}
