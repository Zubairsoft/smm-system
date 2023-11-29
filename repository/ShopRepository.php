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

    public function store($data, ?string $file = null): Shop
    {
        $shop = parent::store($data, $file);

        return $shop->bankAccounts()->createMany($data->bank_accounts);
    }
}
