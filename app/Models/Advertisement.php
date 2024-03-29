<?php

namespace App\Models;

use Domain\Supports\Concerns\Attributes\ImageAttribute;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Advertisement extends BaseModel implements HasMedia
{
    use InteractsWithMedia, ImageAttribute;

    protected $fillable = [
        'text',
        'expire_at',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'expire_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
}
