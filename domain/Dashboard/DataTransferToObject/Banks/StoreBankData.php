<?php

namespace Domain\Dashboard\DataTransferToObject\Banks;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;

class StoreBankData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $name,
        public bool $is_active = true,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:100',
            ],
            'is_active' => [
                'boolean'
            ],

        ];
    }
}
