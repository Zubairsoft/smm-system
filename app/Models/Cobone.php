<?php

namespace App\Models;

use Domain\Shops\Attributes\CoboneAttributes;
use Domain\Shops\Enums\CoboneTypeEnum;

class Cobone extends BaseModel
{
    use CoboneAttributes;

    protected $fillable = [
        'token',
        'type',
        'total_order',
        'start_at',
        'end_at',
    ];

    protected $casts = [
        'type' => CoboneTypeEnum::class,
    ];
}
