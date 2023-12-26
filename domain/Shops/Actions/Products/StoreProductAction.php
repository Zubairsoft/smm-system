<?php

namespace Domain\Shops\Actions\Products;

use App\Models\Product;
use Domain\Shops\DataTransferToObject\Products\StoreProductData;

final class StoreProductAction
{
    public function __invoke(StoreProductData $data): Product
    {
        $shop = currentUser(config('auth.shop-api-guard'));

        $product = $shop->products()->create($data->toArray());

        $product->addMedia($data->image)->toMediaCollection('image');

        addMultipleMedia($product, 'product_images', 'product_images');

        if ($data->tag_ids) {

            $product->tags()->sync($data->tag_ids);
        }

        return $product;
    }
}
