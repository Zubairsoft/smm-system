<?php

namespace Repository;

use App\Models\Transaction;
use Domain\Supports\DataTransferToObject\Transactions\IndexTransactionData;
use Illuminate\Database\Eloquent\Builder;

class TransactionRepository
{

    public function index(IndexTransactionData $data, string $id)
    {
        $transaction = Transaction::query()->whereIn('from_id', $id)
            ->orWhereIn('to_id', $id)->sort(['created_at'], $data->sorts);

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
