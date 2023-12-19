<?php

namespace Domain\Dashboard\DataTransferToObject\ProductAttributeDetails;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateProductAttributeDetailData extends Data
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
                'min:3',
                'max:16',
            ],
            'name_en' => [
                'min:3',
                'max:16',
            ],
            'is_active' => [
                'boolean'
            ],
        ];
    }
}
