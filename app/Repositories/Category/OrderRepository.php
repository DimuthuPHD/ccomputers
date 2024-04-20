<?php

namespace App\Repositories\Category;

use App\Models\Order;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository
{

    public $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }


}
