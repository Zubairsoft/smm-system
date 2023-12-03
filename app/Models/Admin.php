<?php

namespace App\Models;

use Domain\Dashboard\Attributes\AdminAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends BaseModel
{
    use AdminAttributes, HasApiTokens, SoftDeletes, HasRoles;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'password',
        'is_active'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    
}
