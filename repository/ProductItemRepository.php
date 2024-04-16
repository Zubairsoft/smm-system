<?php

namespace Repository;

use App\Models\Product;

class ProductItemRepository extends BaseTwoParmCrudRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Product::class;

        $this->relationship = 'productItems';
    }
}
