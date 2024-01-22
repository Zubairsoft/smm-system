<?php

namespace Domain\Dashboard\DataTransferToObject\Settings;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdatePromotionalOfferSettingData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|float $price,
    ) {
    }

    public static function rules(): array
    {
        return [
            'price' => [
                'numeric',
                'min:0',
            ],

        ];
    }
}
