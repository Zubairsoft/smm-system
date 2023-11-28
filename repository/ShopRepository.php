<?php

namespace Repository;

use App\Models\Shop;

class ShopRepository
{
    private $model = Shop::class;

    public function index($data)
    {

    }

    public function store($data, string $file): Shop
    {
        $shop = app($this->model)->query()->create($data->toArray());

        if (isFile($data->{$file})) {
            $shop->addMedia($data->{$file})->toMediaCollection('avatar');
        }

        return $shop;
    }

    public function show($id): Shop
    {
        return app($this->model)->query()->findOrFail($id);
    }

    public function update($data, string $id, string $file): Shop
    {
        $shop = app($this->model)->query()->findOrFail($id);

        $shop->update($data->toArray());

        if (isFile($data->{$file})) {
            $shop->addMedia($data->{$file})->toMediaCollection('avatar');
        }

        return $shop->refresh();
    }

    public function destroy($id): void
    {
        $shop = app($this->model)->query()->findOrFail($id);

        $shop->delete();
    }
}
