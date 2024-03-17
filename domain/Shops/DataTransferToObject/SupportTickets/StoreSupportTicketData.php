<?php

namespace Domain\Shops\DataTransferToObject\SupportTickets;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreSupportTicketData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $title,
        public string $subject,
        public Optional|UploadedFile $attachment
    ) {
    }

    public static function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'subject' => [
                'required',
                'string',
                'min:10',
                'max:600',
            ],
            'attachment' => [
                File::types(['pdf', 'png', 'jpeg', 'jpg'])->max(2 * 1024)
            ],
        ];
    }
}
