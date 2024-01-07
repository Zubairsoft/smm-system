<?php

namespace Domain\Shops\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CouponAttributes
{
    protected function coboneType(): Attribute
    {
        return new Attribute(get: fn () => $this->type->description);
    }
}
