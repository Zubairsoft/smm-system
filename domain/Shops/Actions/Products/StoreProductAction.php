<?php

namespace Domain\Shops\Actions\Products;

use App\Models\Product;
use Domain\Shops\DataTransferToObject\Products\StoreProductData;

final class StoreProductAction
{
    public function __invoke(StoreProductData $data): Product
    {
        $data->checkQuantity();

        $shop = currentUser(config('auth.shop-api-guard'));

        $attributes = $data->toArray() + $data->getQuantityAttribute();

        $product = $shop->products()->create($attributes);

        $product->addMedia($data->image)->toMediaCollection('image');

        addMultipleMedia($product, 'product_images', 'product_images');

        if ($data->tag_ids) {

            $product->tags()->sync($data->tag_ids);
        }
        $i = 0;
        foreach ($data->product_items as $productItem) {
            $item = $product->productItems()->create($productItem);
            $item->productColorItems()->createMany($data->product_color_items[$i]);
            $i++;
        }

        return $product->refresh();
    }
}
