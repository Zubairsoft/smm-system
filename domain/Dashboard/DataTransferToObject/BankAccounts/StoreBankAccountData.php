<?php

namespace Domain\Dashboard\DataTransferToObject\BankAccounts;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Domain\Supports\Enums\CurrencyEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

class StoreBankAccountData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $bank_id,
        public string $account_number,
        public string $currency,
    ) {
    }

    public static function rules(): array
    {
        return [
            'bank_id' => [
                'required',
                'max:100',
            ],
            'account_number' => [
                'required',
                'numeric'
            ],
            'currency' => [
                'required',
                Rule::in(CurrencyEnum::getValues()),
            ],
        ];
    }
}
