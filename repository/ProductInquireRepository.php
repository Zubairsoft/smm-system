<?php

namespace Repository;

use App\Models\ProductInquire;

class ProductInquireRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = ProductInquire::class;
    }
}
