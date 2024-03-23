<?php

namespace Domain\Shops\Actions\ProductInquires;

use App\Models\ProductInquire;
use Domain\Shops\DataTransferToObject\ProductInquires\UpdateProductInquireData;

final class UpdateProductInquireAction
{
    public function __invoke(UpdateProductInquireData $data, string $id): ProductInquire
    {
        $productInquire = ProductInquire::query()->findOrFail($id);

        $productInquire->update($data->toArray());

        return $productInquire->refresh();
    }
}
