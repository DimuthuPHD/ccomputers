<?php

namespace App\View\Components\FrontEnd;

use App\Models\Review;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReviewBlock extends Component
{

    public $review;
    /**
     * Create a new component instance.
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-end.review-block');
    }
}
