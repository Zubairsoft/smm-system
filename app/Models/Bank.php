<?php

namespace App\Models;

use Domain\Supports\Scopes\ActiveScopeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends BaseModel
{
    use SoftDeletes, ActiveScopeTrait;

    protected $fillable = [
        'name',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
