<?php

namespace Domain\Dashboard\DataTransferToObject\Shops;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateShopData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $name,
        public Optional|string $owner_name,
        public Optional|string $address, //TODO make foreign key
        public Optional|string $email,
        public Optional|UploadedFile $avatar,
        public Optional|string $phone,
        public Optional|string $password,
        public Optional|bool $is_active,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => [
                'min:3',
                'max:100',
            ],
            'owner_name' => [
                'min:3',
                'max:255',
            ],
            'address' => [
                'max:255',
            ],
            'email' => [
                'email',
                'max:255',
                Rule::unique('shops','email'),
            ],
            'avatar' => [
                File::types(['png', 'jpeg', 'jpg', 'png'])->max(2 * 1024),
            ],
            'phone' => [
                'max:100',
                Rule::unique('shops','phone'),

            ],
            'password' => [
                'min:8',
            ],
            'is_active' => [
                'boolean',
            ],
        ];
    }
}
