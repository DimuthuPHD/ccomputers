<?php

namespace App\View\Components\FrontEnd;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopNav extends Component
{

    public $categoryRepository;


    /**
     * Create a new component instance.
     */


     public function __construct(CategoryRepository $categoryRepository)
     {
         $this->categoryRepository = $categoryRepository;
     }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = $this->categoryRepository->getFeatured();
        return view('components.front-end.top-nav', ['categories' => $categories]);
    }
}
