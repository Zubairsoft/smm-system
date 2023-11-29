<?php

namespace Domain\Dashboard\DataTransferToObject\BankAccounts;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Domain\Supports\Enums\CurrencyEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateBankAccountData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $bank_id,
        public Optional|string $account_number,
        public Optional|string $currency,
    ) {
    }

    public static function rules(): array
    {
        return [
            'bank_id' => [
                'max:100',
            ],
            'account_number' => [
                'numeric'
            ],
            'currency' => [
                Rule::in(CurrencyEnum::getKeys()),
            ],
        ];
    }
}
