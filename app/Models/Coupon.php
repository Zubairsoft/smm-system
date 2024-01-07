<?php

namespace App\Models;

use Domain\Shops\Attributes\CouponAttributes;
use Domain\Shops\Enums\CouponTypeEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Coupon extends BaseModel
{
    use CouponAttributes;

    protected $fillable = [
        'code',
        'type',
        'total_order',
        'start_at',
        'end_at',
    ];

    protected $casts = [
        'type' => CouponTypeEnum::class,
    ];



    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
