<?php

namespace App\Models;

use Domain\Dashboard\Attributes\CategoryAttributes;
use Domain\Supports\Scopes\ActiveScopeTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends BaseModel implements HasMedia
{
    use InteractsWithMedia, CategoryAttributes, ActiveScopeTrait;

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

        $this->addMediaCollection('cover_image')
            ->singleFile();
    }
}
