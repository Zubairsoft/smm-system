<?php

namespace Domain\Dashboard\DataTransferToObject\Sessions;

use Spatie\LaravelData\Data;

final class LoginData extends Data
{
    public function __construct(
        public string $phone,
        public string $password,
    ) {
    }

    public function rules()
    {
        return [
            'phone' => [
                'require',
                'max:100',
            ],
            'password' => [
                'require',
            ]
        ];
    }
}
