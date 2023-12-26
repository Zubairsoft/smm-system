<?php

namespace Domain\Shops\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ProductAttributes
{

    protected function image(): Attribute
    {
        return new Attribute(get: fn () => $this->getFirstMediaUrl('image'));
    }

    protected function productImages(): Attribute
    {
        return new Attribute(get: fn () => $this->getMedia('product_images'));
    }
}
