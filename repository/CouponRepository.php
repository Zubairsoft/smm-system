<?php

namespace Repository;

use App\Models\Coupon;
use App\Models\Shop;
use Spatie\LaravelData\Data;
use Illuminate\Database\Eloquent\Model;

class CouponRepository extends BaseTwoParmCrudRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Shop::class;
        $this->relationship = 'coupons';
    }

    public function store(Data $data, string $id): Model
    {
        $coupon = parent::store($data, $id);

        $this->AddProducts($coupon, 'product_ids');

        return $coupon->refresh();
    }

    public function update(Data $data, string $id, string $modelId): Model
    {
        $coupon = parent::update($data, $id, $modelId);

        $this->AddProducts($coupon, 'product_ids');

        return $coupon->refresh();
    }

    private function AddProducts(Coupon $coupon, string $key): void
    {
        if (request()->has($key)) {
            $coupon->shop->checkProducts(request($key));
            $coupon->products()->sync(request($key));
        }
    }
}
