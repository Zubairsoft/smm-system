<?php

namespace Repository;

use App\Models\BankAccount;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;

class BankAccountRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = BankAccount::class;
    }

    public function storeBankAccount($data, string $id): BankAccount
    {

        return $this->storeShopBankAccount($data,$id);
    }

    private function storeShopBankAccount($data, string $id): BankAccount
    {
        $shop = Shop::query()->findOrFail($id);

        $bankAccount = $shop->bankAccounts()->create($data->toArray());

        return $bankAccount;
    }
}
