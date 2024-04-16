<?php

namespace Domain\Shops\DataTransferToObject\ProductItems;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreProductItemData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $product_attribute_detail_id,
        public float $quantity,
        public Optional|float $price
    ) {
    }

    public static function rules(): array
    {
        return [
            'product_attribute_detail_id' => [
                'required',
                Rule::exists('product_attribute_details', 'id')
            ],
            'quantity' => [
                'required',
                'numeric',
                'min:1'
            ],
            'price' => [
                'numeric',
                'min:0'
            ],
        ];
    }
}
