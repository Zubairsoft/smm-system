<?php

namespace Domain\Dashboard\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait AdminAttributes
{
    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => bcrypt($value));
    }
}
