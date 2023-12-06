<?php

namespace Domain\Shops\Specifications\Shops;

use App\Models\Shop;
use Domain\Supports\Interfaces\SpecificationInterface;

class VerifiedPhone implements SpecificationInterface
{
    public function __construct(public Shop $shop)
    {
    }

    public function isAllow(): bool
    {
        return !is_null($this->shop->phone_verified_at);
    }
}
