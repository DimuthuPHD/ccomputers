<?php

namespace App\Repositories\Review;

use App\Models\Review;
use App\Repositories\BaseRepository;
use GuzzleHttp\Client;

class ReviewRepository extends BaseRepository
{

    public $model;

    public function __construct(Review $model)
    {
        $this->model = $model;
    }


    public function paginate($paginate = 10)
    {
        return $this->model->newQuery()->paginate($paginate);
    }

    public function filter($filters, $paginate = null)
    {
        $products = $this->model->newQuery()
            ->when(isset($filters['product']), function ($q) use ($filters) {
                $q->whereHas('product', function ($subQuery) use ($filters) {
                    $subQuery->where('slug', $filters['product']);
                });
            })
            ->when(isset($filters['review_sentiment']), function ($q) use ($filters) {
                $q->where('review_sentiment', $filters['review_sentiment']);
            })
            ->when(isset($filters['date_from']), function ($q) use ($filters) {
                $q->where('created_at', '>=', $filters['date_from']);
            })
            ->when(isset($filters['date_to']), function ($q) use ($filters) {
                $q->where('created_at', '<=', $filters['date_to']);
            });

            if ($paginate) {
                $products = $products->paginate(10);
            }else{
                $products = $products->get();
            }

        return $products;
    }


    public function analyseReview($review_text)
    {
        try {

            $client = new Client();

            $response = $client->post('http://18.143.164.143:8001/predict', [
                'headers' => [
                    'Accept' => '/',
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'review' => $review_text
                ]
            ]);

            $result =  json_decode($response->getBody(), true);

            return $result['sentiment'];
        } catch (\Throwable $th) {
            logger()->log('info', $th->getMessage());
            return redirect()->back()->with('success', 'Your review submission encountered an error. Please try again later.');
        }
    }
}
