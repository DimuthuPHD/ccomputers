<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontEnd\ReviewRequest;
use App\Models\Product;
use App\Repositories\Review\ReviewRepository;


class ReviewController extends Controller
{
    public $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function submit(Product $product, ReviewRequest $request){
        try {

           $review_sentiment =  $this->reviewRepository->analyseReview($request->review_text);

            $this->reviewRepository->create([
                'customer_id' => auth('customer')->user()->id,
                'product_id' => $product->id,
                'name' => $request->name,
                'email' => $request->email,
                'rating' => '5',
                'review_text' => $request->review_text,
                'review_sentiment' => $review_sentiment
            ]);

            return redirect()->back()->with('success', 'Your review has been submitted. Thank you for your review.');

        } catch (\Throwable $th) {
            logger()->log('info', $th->getMessage());
            return redirect()->back()->with('success', 'Your review submission encountered an error. Please try again later.');
        }

    }
}
