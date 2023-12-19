<?php

namespace App\Models;

use Domain\Supports\Scopes\ActiveScopeTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductAttribute extends BaseModel
{
    use ActiveScopeTrait;
    
    protected $fillable = [
        'name_ar',
        'name_en',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function productAttributeDetails(): HasMany
    {
        return $this->hasMany(ProductAttributeDetail::class);
    }
}
