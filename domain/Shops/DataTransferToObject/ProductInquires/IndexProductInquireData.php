<?php

namespace Domain\Shops\DataTransferToObject\ProductInquires;

use Domain\Shops\Enums\ProductInquireStatusEnum;
use Domain\Supports\Enums\SortEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IndexProductInquireData extends Data
{
    public function __construct(
        public int $page = 1,
        public int $per_page = 10,
        public Optional|string $search_text,
        public Optional|array $sorts = ['created_at' => SortEnum::DESCENDING],
        public Optional|string $status
    ) {
    }

    public static function rules(): array
    {
        return [
            'search_text' => 'string',
            'sorts' => 'array',
            'sorts.*' => [
                Rule::in(SortEnum::getValues())
            ],
            'status' => [
                Rule::in(ProductInquireStatusEnum::getKeys())
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
