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

        addMultipleMedia($product, $data->product_images, 'product_images');

        if ($data->tags) {

            $product->tags()->sync($data->tags);
        }

        return $product;
    }
}
