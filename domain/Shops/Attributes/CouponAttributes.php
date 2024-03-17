<?php

namespace Domain\Shops\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CouponAttributes
{
    protected function couponType(): Attribute
    {
        return new Attribute(get: fn () => $this->type->description);
    }
}
