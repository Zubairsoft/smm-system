<?php

namespace Domain\Shops\DataTransferToObject\Sessions;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;

class ActivatePhoneData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $id,
        public int $otp,

    ) {
    }

    public static function rules(): array
    {
        return [
            'id' => [
                'required',
                'uuid',
            ],
            'otp' => [
                'required',
                'integer',
            ]
        ];
    }
}
