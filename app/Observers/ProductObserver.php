<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{

    /**
     * Handle the Product "creating" event.
     */
    public function creating(Product $product): void
    {
        $product->total_price = $product->calculateTotalPrice();
    }
    /**
     * Handle the Product "updating" event.
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
