<?php

namespace Domain\Shops\DataTransferToObject\ProductColorItems;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreProductColorItemData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $color_id,
        public float $quantity,
        public Optional|float $price
    ) {
    }

    public static function rules(): array
    {
        return [
            'color_id' => [
                'required',
                Rule::exists('colors', 'id')
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
