<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{

    public $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }


    function getParents()
    {
        return $this->model->whereNull('parent_id')->with('children')->get();
    }
}
