<?php

namespace Domain\Dashboard\DataTransferToObject\Sessions;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;

class LoginData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $phone,
        public string $password,
    ) {
    }

    public static function rules(): array
    {
        return [
            'phone' => [
                'required',
                'max:100'
            ],
            'password' => [
                'required'
            ],
        ];
    }
}
