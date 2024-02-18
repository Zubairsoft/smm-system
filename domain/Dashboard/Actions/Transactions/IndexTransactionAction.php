<?php

namespace Domain\Dashboard\Actions\Transactions;

use App\Models\Transaction;
use Domain\Dashboard\DataTransferToObject\Wallets\IndexTransactionData;
use Illuminate\Database\Eloquent\Builder;

class IndexTransactionAction
{
    public function __invoke(IndexTransactionData $data, string $id)
    {
        $transaction = Transaction::query()->where('from_id', $id)
            ->orWhere('to_id', $id)->sort(['created_at'], $data->sorts);

        $this->fillerDate($transaction, $data->date);


        return $transaction->sort(['created_at', $data->sorts])->paginate($data->per_page);
    }

    private function fillerDate(Builder $query, array $data): Builder
    {
        if (count($data) > 0) {
            return $query->whereBetween('created_at', $data);
        }

        return $query;
    }
}
