<?php

namespace App\Observers;

use App\Models\Cobone;
use Domain\Shops\Enums\CoboneTypeEnum;

class CoboneObserver
{
    /**
     * Handle the cobone "updating" event.
     */
    public function updating(Cobone $cobone): void
    {
        if ($cobone->isDirty('type')) {

            if ($cobone->type->is(CoboneTypeEnum::SPECIFIC_PRODUCT)) {
                $cobone->total_order = null;
            }
        }
    }
}
