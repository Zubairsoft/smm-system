<?php

namespace Domain\Shops\Actions\Products;

use App\Models\Product;
use Domain\Shops\DataTransferToObject\Products\UpdateProductData;

final class UpdateProductAction
{
    public function __invoke(UpdateProductData $data, string $id): Product
    {
        $shop = currentUser(config('auth.shop-api-guard'));

        $product = $shop->products()->findOrFail($id);

        $product->update($data->toArray());

        if ($data->image) {
            $product->addMedia($data->image)->toMediaCollection('image');
        }

        if ($data->product_images) {
            addMultipleMedia($product, $data->product_images, 'product_images');
        }

        if ($data->tags) {

            $product->tags()->sync($data->tags);
        }

        return $product->refresh();
    }
}
