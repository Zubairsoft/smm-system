<?php

namespace Domain\Dashboard\DataTransferToObject\Banks;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Support\Optional;
use Spatie\LaravelData\Data;

class UpdateColorData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $name_ar,
        public Optional|string $name_en,
        public Optional|bool $is_active,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name_ar' => [
                'min:3',
                'max:100',
            ],
            'name_en' => [
                'min:3',
                'max:100',
            ],
            'is_active' => [
                'boolean'
            ],

        ];
    }
}
