<?php

namespace Domain\Dashboard\DataTransferToObject\Banks;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateBankData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $name,
        public Optional|bool $is_active,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => [
                'min:3',
                'max:100',
            ],
            'is_active' => [
                'boolean'
            ],

        ];
    }
}
