<?php

namespace Domain\Dashboard\DataTransferToObject\ProductAttributes;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreProductAttributeData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $name_ar,
        public string $name_en,
        public Optional|bool $is_active,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name_ar' => [
                'required',
                'min:3',
                'max:32',
            ],
            'name_en' => [
                'required',
                'min:3',
                'max:32',
            ],
            'is_active' => [
                'boolean'
            ],
        ];
    }
}
