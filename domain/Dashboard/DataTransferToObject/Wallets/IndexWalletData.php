<?php

namespace Domain\Dashboard\DataTransferToObject\Wallets;

use Domain\Dashboard\Enums\WalletTypeEnum;
use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class IndexWalletData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public null|string $type,
        public int $page = 1,
        public int $per_page = 10,
    ) {
        $this->setType();
    }

    public static function rules(): array
    {
        return [
            'type' => [
                'nullable',
                Rule::in(WalletTypeEnum::getKeys())
            ],
            'page' => [
                'integer',
            ],
            'per_page' => [
                'integer',
            ]
        ];
    }

    private function setType()
    {
        if ($this->type) {
            $this->type = WalletTypeEnum::getValue($this->type);
        }
    }
}
