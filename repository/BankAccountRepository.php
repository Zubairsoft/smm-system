<?php

namespace Repository;

use App\Models\Shop;

class BankAccountRepository extends BaseTwoParmCrudRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Shop::class;

        $this->relationship = 'bankAccounts';
    }
}
