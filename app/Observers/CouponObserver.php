<?php

namespace App\Observers;

use App\Models\Coupon;
use Domain\Shops\Enums\CouponTypeEnum;
use Illuminate\Support\Str;

class CouponObserver
{

    /**
     * Handle the cobone "creating" event.
     */
    public function creating(Coupon $cobone): void
    {
        $cobone->code = Str::random(10);
    }

    /**
     * Handle the cobone "updating" event.
     */
    public function updating(Coupon $cobone): void
    {
        if ($cobone->isDirty('type')) {

            if ($cobone->type->is(CouponTypeEnum::SPECIFIC_PRODUCT)) {
                $cobone->total_order = null;
            }


            if ($cobone->type->is(CouponTypeEnum::TOTAL_ORDER)) {
                $cobone->products()->sync([]);
            }
        }
    }
}
