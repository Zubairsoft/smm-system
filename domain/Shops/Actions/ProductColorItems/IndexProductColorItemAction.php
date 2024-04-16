<?php

namespace Domain\Shops\Actions\ProductColorItems;

use App\Models\ProductItem;

final class IndexProductColorItemAction
{
    public function __construct(string $id, string $productItemId)
    {
        $productItem = ProductItem::query()->where('product_id', $id)->where('id', $productItemId)->firstOrFail();

        return $productItem->productColorItems()->orderBy('created_at', 'asc')->get();
    }
}
