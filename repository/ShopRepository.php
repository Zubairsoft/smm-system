<?php

namespace Repository;

use App\Models\Shop;

class ShopRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Shop::class;
    }


}
