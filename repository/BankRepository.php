<?php

namespace Repository;

use App\Models\Bank;
use App\Models\Shop;

class BankRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Bank::class;
    }

}
