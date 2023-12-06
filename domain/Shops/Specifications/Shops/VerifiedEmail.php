<?php

namespace Domain\Shops\Specifications\Shops;

use App\Models\Shop;
use Domain\Supports\Interfaces\SpecificationInterface;

class VerifiedEmail implements SpecificationInterface
{
    public function __construct(public Shop $shop)
    {
    }

    public function isAllow(): bool
    {
        return !is_null($this->shop->email_verified_at);
    }
}
