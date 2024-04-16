<?php

namespace Domain\Shops\DataTransferToObject\ProductItems;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateProductItemData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $product_attribute_detail_id,
        public Optional|float $quantity,
        public Optional|float $price
    ) {
    }

    public static function rules(): array
    {
        return [
            'product_attribute_detail_id' => [
                Rule::exists('product_attribute_details', 'id')
            ],
            'quantity' => [
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
