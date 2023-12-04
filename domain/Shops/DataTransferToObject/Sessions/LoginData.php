<?php

namespace Domain\Shops\DataTransferToObject\Sessions;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;

class LoginData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $email,
        public string $password,
    ) {
    }

    public static function rules(): array
    {
        return [
            'email' => [
                'required',
                'max:100'
            ],
            'password' => [
                'required',
                'max:255',
            ],
        ];
    }
}
