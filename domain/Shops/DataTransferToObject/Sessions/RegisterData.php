<?php

namespace Domain\Shops\DataTransferToObject\Sessions;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;

class RegisterData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $name,
        public string $owner_name,
        public string $address, //TODO make foreign key
        public string $email,
        public string $description,
        public UploadedFile $avatar,
        public string $phone,
        public string $password,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:100',
            ],
            'owner_name' => [
                'required',
                'max:255',
            ],
            'address' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('shops', 'email'),
                'max:255',
            ],
            'avatar' => [
                'required',
                File::types(['png', 'jpeg', 'jpg', 'png'])->max(2 * 1024),
            ],
            'description' => [
                'required',
                'min:8',
            ],
            'phone' => [
                'required',
                Rule::unique('shops', 'phone'),
                'max:15',
            ],
            'password' => [
                'required',
                'max:255',
                'confirmed',
            ],

        ];
    }
}
