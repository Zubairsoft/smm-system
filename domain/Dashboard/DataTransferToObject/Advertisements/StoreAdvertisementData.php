<?php

namespace Domain\Dashboard\DataTransferToObject\Advertisements;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreAdvertisementData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $text,
        public string $expire_at,
        public UploadedFile $image,
        public Optional|bool $is_active
    ) {
    }

    public static function rules(): array
    {
        return [
            'text' => [
                'required',
                'string',
                'min:10',
            ],
            'expire_at' => [
                'required',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:today'
            ],
            'image' => [
                'required',
                File::types(['png', 'jpg', 'jpeg'])->max(2 * 1024)
            ],
            'is_active' => [
                'boolean',
            ]
        ];
    }
}
