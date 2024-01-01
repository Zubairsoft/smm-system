<?php

namespace App\Observers;

use App\Models\Shop;

class ShopObserver
{
    /**
     * Handle the Shop "created" event.
     */
    public function created(Shop $shop): void
    {
        $shop->sendEmailVerificationCode($shop->email);
        $shop->sendPhoneVerificationCode($shop->verifyPhone->phone);
    }
}
