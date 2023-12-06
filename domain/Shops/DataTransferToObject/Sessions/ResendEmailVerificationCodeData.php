<?php

namespace Domain\Shops\DataTransferToObject\Sessions;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

class ResendEmailVerificationCodeData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $email,
    ) {
    }

    public static function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
            ]
        ];
    }
}
