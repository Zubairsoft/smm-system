<?php

namespace Domain\Shops\Attributes;

use Domain\Supports\Concerns\Attributes\ImageAttribute;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait ProductAttributes
{
    use ImageAttribute;

    protected function productImages(): Attribute
    {
        return new Attribute(get: fn () => $this->getMedia('product_images'));
    }
}
