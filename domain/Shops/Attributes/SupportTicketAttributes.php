<?php

namespace Domain\Shops\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait SupportTicketAttributes
{
    protected function status(): Attribute
    {
        return new Attribute(get: fn ($value) => $value->description);
    }

    protected function attachment(): Attribute
    {
        return new Attribute(get: fn () => $this->getFirstMediaUrl('attachment'));
    }
}
