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

    public function submit(Product $product, ReviewRequest $request)
    {
        try {

            $customer = auth('customer')->user();
            $message = 'Your review has been submitted. Thank you for your review.';
            $review_points = $customer->reviewPoints()->where(['product_id' => $product->id])->orWhere(['is_used' => false])->count();

            $review_sentiment =  $this->reviewRepository->analyseReview($request->review_text);

            $review = $this->reviewRepository->create([
                'customer_id' => $customer->id,
                'product_id' => $product->id,
                'name' => $request->name,
                'email' => $request->email,
                'rating' => '5',
                'review_text' => $request->review_text,
                'review_sentiment' => $review_sentiment
            ]);

            if ($review_points <= 0) {
                $customer->reviewPoints()->create([
                    'customer_id' => $customer->id,
                    'product_id' => $product->id,
                    'review_id' => $review->id,
                    'value' => 5,
                    'is_used' => false,
                    'notes' => ''
                ]);

                $message = "Congratulations! You've earned a 5% discount on your next order by submitting this review.";
            }

            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            dd($th);
            logger()->log('info', $th->getMessage());
            return redirect()->back()->with('success', $message);
        }
    }
}
