<?php

namespace App\View\Components\FrontEnd;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StoreProduct extends Component
{

    private $product;

    /**
     * Create a new component instance.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-end.store-product', ['product' => $this->product]);
    }
}
