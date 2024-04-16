<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductItem extends BaseModel
{

    protected $fillable = [
        'product_attribute_detail_id',
        'quantity',
        'price'
    ];

    protected $casts = [];

    public function productColorItems(): HasMany
    {
        return $this->hasMany(ProductColorItem::class);
    }
}
