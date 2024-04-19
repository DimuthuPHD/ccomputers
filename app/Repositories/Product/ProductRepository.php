<?php namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository {

    public $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }


    public function filter($filters){

        $products = $this->model->newQuery()->when(isset($filters['cat']), function ($q) use ($filters){
            $cats = is_array($filters['cat']) ? $filters['cat'] : [$filters['cat']];
            $q->whereHas('categories', function ($subQuery) use ($cats) {
                $subQuery->whereIn('slug', $cats);
            });
        })
        ->when(isset($filters['price']), function ($q) use ($filters) {
            $price = explode(' - ', $filters['price']);
            $minPrice = (int) preg_replace('/[^0-9]/', '', $price[0]);
            $maxPrice = (int) preg_replace('/[^0-9]/', '', $price[1]);
            $q->whereBetween('price', [$minPrice, $maxPrice]);
        })
        ->when(isset($filters['search']), function ($q) use ($filters) {
            $q->where('name', 'like' , "%{$filters['search']}%");
        })

        ->paginate(10);

        return $products;
    }

}
