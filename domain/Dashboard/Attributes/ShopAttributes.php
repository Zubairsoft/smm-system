<?php

namespace Domain\Dashboard\Attributes;

use Domain\Supports\Concerns\Attributes\PasswordAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait ShopAttributes
{
    use PasswordAttribute;

    protected function avatar(): Attribute
    {
        return new Attribute(get: fn () => $this->getFirstMediaUrl('avatar'));
    }
}
