<?php

namespace Domain\Supports\Concerns\Transactions;

use App\Exceptions\LogicException;
use App\Models\Wallet;
use Domain\Supports\Enums\CurrencyEnum;
use Domain\Supports\Enums\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasTransaction
{

    public function wallets(): MorphMany
    {
        return $this->morphMany(Wallet::class, 'accountable');
    }

    public function deposit(CurrencyEnum $currency, float $amount, string $from, string $statement = null)
    {
        $wallet = $this->wallets()->where('currency', $currency)->firstOfFail();

        $transaction = $wallet->to()->create([
            'amount' => $amount,
            'currency' => $currency,
            'type' => TransactionTypeEnum::DEPOSIT,
            'from_id' => $from,
            'statement' => $statement,
            'notify' => __('messages.transition.notify', ['process', 'ايداع', 'amount' => $amount]),
        ]);

        $wallet->forceUpdate(['balance' => $wallet->balance + $transaction->amount]);
    }

    public function withdrawal(CurrencyEnum $currency, float $amount, string $to, string $statement = null)
    {
        $wallet = $this->wallets()->where('currency', $currency)->firstOfFail();

        if ($this->checkBalance($wallet, $amount)) {
            throw new LogicException(__('exceptions.not_enough_balance'));
        }

        $transaction = $wallet->from()->create([
            'amount' => $amount,
            'currency' => $currency,
            'type' => TransactionTypeEnum::WITHDRAWAL,
            'to_id' => $to,
            'statement' => $statement,
            'notify' => __('messages.transition.notify', ['process', 'سحب', 'amount' => $amount]),
        ]);

        $wallet->forceUpdate(['balance' => $wallet->balance - $transaction->amount]);
    }

    private function checkBalance(Wallet $wallet, float $amount): bool
    {
        return $wallet->balance < $amount ? false : true;
    }
}
