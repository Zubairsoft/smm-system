<?php

namespace Domain\Dashboard\DataTransferToObject\Brands;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateBrandData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $name_ar,
        public Optional|string $name_en,
        public Optional|UploadedFile $image,
        public Optional|bool $is_active,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name_ar' => [
                'min:3',
                'max:16',
            ],
            'name_en' => [
                'min:3',
                'max:16',
            ],
            'is_active' => [
                'boolean'
            ],
            'image' => [
                File::types(['png', 'jpeg', 'jpg'])->max(2 * 1024)
            ],
        ];
    }
}
