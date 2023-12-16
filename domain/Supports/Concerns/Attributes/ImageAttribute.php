<?php

namespace Domain\Supports\Concerns\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ImageAttribute
{

    protected function image(): Attribute
    {
        return new Attribute(get: fn () => $this->getFirstMediaUrl('image'));
    }
}
