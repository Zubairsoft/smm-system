<?php

namespace Domain\Dashboard\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ShopAttributes
{
    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => bcrypt($value));
    }

    protected function avatar(): Attribute
    {
        return new Attribute(get: fn () => $this->getFirstMediaUrl('avatar'));
    }
}
