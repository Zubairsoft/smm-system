<?php

namespace Domain\Shops\DataTransferToObject\Transactions;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Domain\Supports\DataTransferToObject\Transactions\IndexTransactionData as TransactionsIndexTransactionData;
use Domain\Supports\Enums\CurrencyEnum;
use Domain\Supports\Enums\SortEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Optional;

class IndexTransactionData extends TransactionsIndexTransactionData
{
    // use HasFailedValidationDtoRequest;



    public function __construct(
        public int $currency,
    ) {
    }

    public static function rules(): array
    {
        //TODO check data for filter
        return parent::rules() + ['currency' => Rule::in(CurrencyEnum::getKeys())];
    }
}
