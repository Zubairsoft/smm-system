<?php

namespace App\Models;

use Domain\Supports\Enums\TransactionTypeEnum;
use Domain\Supports\Scopes\SortTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends BaseModel
{
    use SortTrait;

    protected $fillable = [
        'amount',
        'currency',
        'type',
        'from_id',
        'to_id',
        'statement'
    ];

    protected $casts = [
        'type' => TransactionTypeEnum::class,
    ];

    public function from(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function to(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
