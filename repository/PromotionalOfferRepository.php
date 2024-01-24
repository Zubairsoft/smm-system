<?php

namespace Repository;

use App\Models\PromotionalOffer;
use Spatie\LaravelData\Data;
use Illuminate\Database\Eloquent\Model;

class PromotionalOfferRepository extends BaseRepository
{
    protected $model;

    private string $productKey;

    protected function setData()
    {
        $this->model = PromotionalOffer::class;
    }

    public function store(Data $data): Model
    {
        $model = parent::store($data);

        $model->addProducts($data, $this->productKey);

        return $model;
    }

    public function show(string $id): Model
    {
        $model = parent::show($id);

        return $model->load('products');
    }

    public function update(Data $data, string $id): Model
    {
        $model = parent::update($data, $id);

        $model->addProducts($data, $this->productKey);

        return $model;
    }

    public function productKey($key): self
    {
        $this->productKey = $key;
        return $this;
    }
}
