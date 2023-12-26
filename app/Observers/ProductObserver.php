<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{

    /**
     * Handle the Product "updated" event.
     */
    public function updating(Product $product): void
    {
        if (
            $product->isDirty('price') or $product->isDirty('discount') or
            $product->isDirty('additional_price_for_size') or $product->isDirty('additional_price_for_color')
        ) {
            $product->total_price = $product->calculateTotalPrice();
        }
    }
}
