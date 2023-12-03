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

    public function store($data): Shop
    {
        $shop = parent::store($data);

        $shop->bankAccounts()->createMany($data->bank_accounts->toArray());

        return $shop;
    }
}
