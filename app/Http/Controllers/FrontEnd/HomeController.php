<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public $productRepository;
    public $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }


    public function index()  {

        $categories = $this->categoryRepository->getParents();
        return view('frontend.home.index', ['categories' => $categories]);
    }
}
