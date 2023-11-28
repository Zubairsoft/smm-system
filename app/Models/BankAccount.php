<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'bank_id',
        'account_number',
        'currency',
    ];

    protected $casts = [];

    public function owner()
    {
        return $this->morphTo();
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
