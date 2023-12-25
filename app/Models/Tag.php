<?php

namespace App\Models;

use Domain\Supports\Scopes\ActiveScopeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends BaseModel
{
    use ActiveScopeTrait;

    protected $fillable = [
        'name_ar',
        'name_en',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
