<?php

namespace Domain\Dashboard\DataTransferToObject\DeliveryWorkers;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateDeliveryWorkerData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $name,
        public Optional|string $identifier,
        public Optional|string $password,
        public Optional|bool $is_active = true,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => [
                'min:3',
                'max:100',
            ],
            'identifier' => [
                'min:9',
                'max:255',
                Rule::unique('delivery_workers','identifier')
            ],
            'password' => [
                'min:6',
                'confirmed'
            ],
            'is_active' => [
                'boolean'
            ],

        ];
    }
}
