<?php

namespace App\Models;

use Domain\Supports\Enums\CurrencyEnum;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'bank_id',
        'account_number',
        'currency',
    ];

    protected $casts = [
        'currency' => CurrencyEnum::class
    ];

    public function owner()
    {
        return $this->morphTo();
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
