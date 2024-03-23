<?php

namespace App\Models;

use Domain\Shops\Enums\ProductInquireStatusEnum;
use Domain\Supports\Scopes\SortTrait;

class ProductInquire extends BaseModel
{
    use SortTrait;

    protected $fillable = [
        'shop_id',
        'product_id',
        'question',
        'replay',
        'status',
    ];

    protected $casts = [
        'status' => ProductInquireStatusEnum::class
    ];
}
