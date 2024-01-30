<?php

namespace App\Models;

use Domain\Supports\Enums\CurrencyEnum;
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
}
