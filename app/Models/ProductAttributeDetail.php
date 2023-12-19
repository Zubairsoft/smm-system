<?php

namespace App\Models;

use Domain\Supports\Scopes\ActiveScopeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
