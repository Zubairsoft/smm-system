<?php

namespace App\Models;

use Domain\Dashboard\Attributes\BrandAttributes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends BaseModel implements HasMedia
{
    use InteractsWithMedia, BrandAttributes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
}
