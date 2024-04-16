<?php

namespace Repository;

use App\Models\ProductItem;
use Illuminate\Database\Eloquent\Model;

class ProductColorItemRepository extends BaseTwoParmCrudRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = ProductItem::class;

        $this->relationship = 'productColorItems';
    }

    public function checkProductItem(string $productId, string $productItemId): Model
    {
        return $this->makeInstanceOfModel()->query()->where('product_id', $productId)->where('id', $productItemId)->firstOrFail();
    }
}
