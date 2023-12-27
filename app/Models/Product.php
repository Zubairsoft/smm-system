<?php

namespace App\Models;

use Domain\Shops\Attributes\ProductAttributes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends BaseModel implements HasMedia
{
    use InteractsWithMedia, ProductAttributes;

    protected $fillable = [
        'name',
        'description',
        'product_attribute_detail_id',
        'category_id',
        'brand_id',
        'colors',
        'quantity',
        'price',
        'additional_price_for_size',
        'additional_price_for_color',
        'total_price',
        'discount',
        'minimum_quantity',
        'is_active',
        'can_refund_money',
        'can_show_quantity',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'can_refund_money' => 'boolean',
        'can_show_quantity' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();

        $this->addMediaCollection('product_images');
    }

    public function calculateTotalPrice(): float
    {
        return $this->getTotalPriceWithoutDiscount() - $this->getDiscount();
    }

    private function getDiscount(): int
    {
        return $this->getTotalPriceWithoutDiscount() * ($this->discount / 100);
    }

    private function getTotalPriceWithoutDiscount(): float
    {
        return ($this->price + $this->additional_price_for_color + $this->additional_price_for_size);
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function productAttributeDetail(): BelongsTo
    {
        return $this->belongsTo(ProductAttributeDetail::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
