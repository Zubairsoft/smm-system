<?php

namespace Domain\Shops\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait SupportTicketAttributes
{
    protected function attachment(): Attribute
    {
        return new Attribute(get: fn () => $this->getFirstMediaUrl('attachment'));
    }
}
