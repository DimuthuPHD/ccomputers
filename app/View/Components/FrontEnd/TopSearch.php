<?php

namespace App\View\Components\FrontEnd;

use App\Repositories\Category\CategoryRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopSearch extends Component
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
        $categories = $this->categoryRepository->getParents();
        return view('components.front-end.top-search', ['categories' => $categories]);
    }
}
