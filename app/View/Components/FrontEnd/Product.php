<?php

namespace App\View\Components\FrontEnd;

use App\Models\Product as ModelsProduct;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Product extends Component
{
    public $product;
    /**
     * Create a new component instance.
     */
    public function __construct(ModelsProduct $product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-end.product');
    }
}
