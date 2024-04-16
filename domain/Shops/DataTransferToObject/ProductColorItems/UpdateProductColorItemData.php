<?php

namespace Domain\Shops\DataTransferToObject\ProductColorItems;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateProductColorItemData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $color_id,
        public Optional|float $quantity,
        public Optional|float $price
    ) {
    }

    public static function rules(): array
    {
        return [
            'color_id' => [
                Rule::exists('colors', 'id')
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
