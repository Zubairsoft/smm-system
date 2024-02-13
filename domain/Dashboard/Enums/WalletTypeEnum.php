<?php

namespace Domain\Dashboard\Enums;

use App\Models\Admin;
use App\Models\Shop;
use App\Models\User;
use BenSampo\Enum\Enum;

class WalletTypeEnum extends Enum
{
    const ADMIN = Admin::class;
    const SHOP = Shop::class;
    const USER = User::class;
}
