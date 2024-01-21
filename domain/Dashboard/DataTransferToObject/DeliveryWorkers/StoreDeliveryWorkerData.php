<?php

namespace Domain\Dashboard\DataTransferToObject\DeliveryWorkers;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

class StoreDeliveryWorkerData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $name,
        public string $identifier,
        public string $password,
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
            'identifier' => [
                'required',
                'min:9',
                'max:255',
                Rule::unique('delivery_workers','identifier')
            ],
            'password' => [
                'required',
                'min:9',
                'confirmed'
            ],
            'is_active' => [
                'boolean'
            ],

        ];
    }
}
