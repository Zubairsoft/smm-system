<?php

namespace Domain\Dashboard\DataTransferToObject\Advertisements;

use DateTime;
use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateAdvertisementData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $text,
        public Optional|DateTime $expire_at,
        public Optional|UploadedFile $image,
        public Optional|bool $is_active
    ) {
    }

    public static function rules(): array
    {
        return [
            'text' => [
                'string',
                'min:10',
            ],
            'expire_at' => [
                'datetime',
                'date_format:Y-m-d H:i:s',
            ],
            'image' => [
                File::types(['png', 'jpg', 'jpeg'])->max(2 * 1024)
            ],
            'is_active' => [
                'boolean',
            ]
        ];
    }
}
