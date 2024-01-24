<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PromotionalOffer extends BaseModel
{

    protected $fillable = [
        'text',
        'duration',
        'expire_at',
    ];

    protected $casts = [
        'expire_at' => 'datetime',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function addProducts($data, $property): void
    {
        $this->products()->sync($data->$property);
    }
}
