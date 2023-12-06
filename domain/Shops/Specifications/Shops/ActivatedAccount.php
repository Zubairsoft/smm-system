<?php

namespace Domain\Shops\Specifications\Shops;

use App\Models\Shop;
use Domain\Supports\Interfaces\SpecificationInterface;

class ActivatedAccount implements SpecificationInterface
{
    public function __construct(public Shop $shop)
    {
    }

    public function isAllow(): bool
    {
        return $this->shop->is_active;
    }
}
