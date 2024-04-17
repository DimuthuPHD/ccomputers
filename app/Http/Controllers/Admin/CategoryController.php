<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CateGory\StoreCategoryRequest;
use App\Http\Requests\Admin\CateGory\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('admin.category.index', ['categories' => $categories,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepository->all()->pluck('name', 'id')->toArray();
        return view('admin.category.create')->withCategories($categories)->withModel(null);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $data = $request->validated();
            $data['is_featured'] = isset($data['is_featured']);
            $this->categoryRepository->create($data);
            return to_route('admin.categories.index')->with(['success' => 'Category created successfully ! ']);
        } catch (\Throwable $th) {
            logger()->log('error', $th);
            return back()->with(['error' => 'Category creating faild.  please try again!']);
        }
        abort(404);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = $this->categoryRepository->all()->where('id', '!=', $category->id)->pluck('name', 'id')->toArray();
        return view('admin.category.edit')->withModel($category)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        try {
            $data = $request->validated();
            $data['is_featured'] = isset($data['is_featured']);
            $category->update($data);
            return to_route('admin.categories.index')->with(['success' => 'Category updated successfully ! ']);
        } catch (\Throwable $th) {
            logger()->log('error', $th);
            return back()->with(['error' => 'Category updating faild.  please try again!']);
        }
        abort(404);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            if($category->children->count() > 0){
                return back()->with(['error' => 'Unable to delete the parent category because it has child categories associated with it. Please delete the child categories first.']);
            }
            $category->delete();
            return to_route('admin.categories.index')->with(['success' => 'Category deleted successfully ! ']);
        } catch (\Throwable $th) {
            logger()->log('error', $th);
            return back()->with(['error' => 'Category deleting faild.  please try again!']);
        }
        abort(404);
    }
}
