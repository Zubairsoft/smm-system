<?php

namespace Domain\Dashboard\DataTransferToObject\Advertisements;

use DateTime;
use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;

class StoreAdvertisementData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $text,
        public DateTime $expire_at,
        public UploadedFile $image,
        public bool $is_active
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
                'datetime',
                'date_format:Y-m-d H:i:s',
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
