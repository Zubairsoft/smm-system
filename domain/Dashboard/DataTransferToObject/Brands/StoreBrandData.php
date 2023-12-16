<?php

namespace Domain\Dashboard\DataTransferToObject\Brands;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreBrandData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $name_ar,
        public string $name_en,
        public UploadedFile $image,
        public Optional|bool $is_active,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name_ar' => [
                'required',
                'min:3',
                'max:16',
            ],
            'name_en' => [
                'required',
                'min:3',
                'max:16',
            ],
            'is_active' => [
                'boolean'
            ],
            'image' => [
                'required',
                File::types(['png', 'jpeg', 'jpg'])->max(2 * 1024)
            ],
        ];
    }
}
