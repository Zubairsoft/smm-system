<?php

namespace Repository;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Collection;

class BankRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Bank::class;
    }

    public function list(): Collection
    {
        return app($this->model)->query()->active()->get();
    }
}
