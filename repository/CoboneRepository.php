<?php

namespace Repository;

use App\Models\Shop;

class CoboneRepository extends BaseTwoParmCrudRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Shop::class;
        $this->relationship = 'cobones';
    }
}
