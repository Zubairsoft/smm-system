<?php

namespace Domain\Dashboard\DataTransferToObject\Wallets;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Domain\Supports\Enums\SortEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IndexTransactionData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public array $sorts = ['created_at' => 'desc'],
        public Optional|array $date,
        public int $page = 1,
        public int $per_page = 10,
    ) {
    }

    public static function rules(): array
    {
        //TODO check data for filter
        return [
            'sorts' => [
                'array',
            ],
            'date' => [
                'array'
            ],
            'date.start_at' => [
                'date_formate:Y-m-d',
            ],
            'date.end_at' => [
                'date_formate:Y-m-d',
                'after:date.start_at',
            ],
            'sorts.*' => [
                Rule::in(SortEnum::getValues())
            ],
            'page' => [
                'integer',
            ],
            'per_page' => [
                'integer',
            ]
        ];
    }
}
