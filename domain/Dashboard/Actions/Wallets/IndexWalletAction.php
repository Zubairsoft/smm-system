<?php

namespace Domain\Dashboard\Actions\Wallets;

use App\Models\Wallet;
use Domain\Dashboard\DataTransferToObject\Wallets\IndexWalletData;
use Illuminate\Database\Eloquent\Builder;

class IndexWalletAction
{
    public function __invoke(IndexWalletData $data)
    {
        $wallets = Wallet::query();
        $wallets->when(
            !is_null(request()->type),
            fn (Builder $query) => $query->where('accountable_type', $data->type)
        );

        return $wallets->paginate($data->per_page);
    }
}
