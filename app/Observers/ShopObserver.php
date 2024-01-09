<?php

namespace App\Observers;

use App\Models\Shop;
use Domain\Dashboard\Actions\Sessions\LogoutAction;

class ShopObserver
{
    /**
     * Handle the Shop "created" event.
     */
    public function created(Shop $shop): void
    {
        $shop->sendEmailVerificationCode($shop->email);
    }


    public function updating(Shop $shop)
    {

        if ($shop->isDirty('phone')) {
            $shop->sendPhoneVerificationCode($shop->phone);
            $shop->phone = null;
            $shop->phone_verified_at = null;
        }

        if ($shop->isDirty('email')) {
            app(LogoutAction::class)();
        }
    }
}
