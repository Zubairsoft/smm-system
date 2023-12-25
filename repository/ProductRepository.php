<?php

namespace Repository;

use App\Models\Product;
use App\Models\Shop;
use Spatie\LaravelData\Data;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseTwoParmCrudRepository
{
    protected function setData()
    {
        $this->model = Shop::class;

        $this->relationship = 'products';
    }
}
