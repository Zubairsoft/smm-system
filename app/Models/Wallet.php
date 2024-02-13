<?php

namespace App\Models;

use Domain\Supports\Enums\CurrencyEnum;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Wallet extends BaseModel
{

    protected $fillable = [
        'balance',
        'currency',
    ];

    protected $casts = [
        'currency' => CurrencyEnum::class
    ];

    public function accountable(): MorphTo
    {
        return $this->morphTo();
    }

    public function from(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function to(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
