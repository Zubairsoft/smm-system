<?php

namespace Repository;

use App\Models\Shop;

class ProductRepository extends BaseTwoParmCrudRepository
{
    protected function setData()
    {
        $this->model = Shop::class;

        $this->relationship = 'products';
    }
}
