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

    function getFeatured()
    {
        return $this->model->where(['is_featured' => 1])->get();
    }

    function getParentFeatured()
    {
        return $this->model->whereNull('parent_id')->where(['is_featured' => 1])->get();
    }
}
