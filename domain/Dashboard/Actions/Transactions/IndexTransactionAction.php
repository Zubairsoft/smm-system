<?php

namespace Domain\Dashboard\Actions\Transactions;

use App\Models\Transaction;
use Domain\Supports\DataTransferToObject\Transactions\IndexTransactionData;
use Illuminate\Database\Eloquent\Builder;
use Repository\TransactionRepository;

class IndexTransactionAction
{
    public function __invoke(IndexTransactionData $data, string $id)
    {
        return (new TransactionRepository())->index($data, $id);
    }
}
