<?php

namespace Domain\Supports\Concerns\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait PasswordAttribute
{

    protected function password(): Attribute
    {
        return new Attribute(set: fn ($value) => bcrypt($value));
    }
}
