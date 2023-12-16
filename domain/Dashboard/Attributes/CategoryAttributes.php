<?php

namespace Domain\Dashboard\Attributes;

use Domain\Supports\Concerns\Attributes\ImageAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait CategoryAttributes
{
    use ImageAttribute;

    protected function coverImage(): Attribute
    {
        return new Attribute(get: fn () => $this->getFirstMediaUrl('cover_image'));
    }
}
