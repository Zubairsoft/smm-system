<?php

namespace App\Models;

use Domain\Supports\Concerns\Attributes\PasswordAttribute;

class DeliveryWorker extends BaseModel
{
    use PasswordAttribute;

    protected $fillable = [
        'name',
        'identifier',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
