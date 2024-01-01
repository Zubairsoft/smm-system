<?php

namespace App\Models;

use Domain\Shops\Enums\CoboneTypeEnum;

class Cobone extends BaseModel
{

    protected $fillable = [
        'token',
        'type',
        'total_order',
        'start_at',
        'end_at',
    ];

    protected $casts = [
        'status' => CoboneTypeEnum::class,
    ];
}
