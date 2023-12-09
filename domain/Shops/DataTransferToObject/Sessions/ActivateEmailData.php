<?php

namespace Domain\Shops\DataTransferToObject\Sessions;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;

class ActivateEmailData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $email,
        public int $otp,

    ) {
    }

    public static function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
            ],
            'otp' => [
                'required',
                'integer',
            ]
        ];
    }
}
