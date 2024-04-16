<?php

namespace App\Models;

use Domain\Supports\Scopes\ActiveScopeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductAttributeDetail extends BaseModel
{
    use ActiveScopeTrait;

    protected $fillable = [
        'name_ar',
        'name_en',
        'product_attribute_id',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function productAttribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class);
    }

    public function productColorItems(): HasMany
    {
        return $this->hasMany(ProductColorItem::class);
    }

    public function productItems(): HasMany
    {
        return $this->hasMany(ProductItem::class);
    }
}
