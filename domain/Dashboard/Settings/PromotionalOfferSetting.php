<?php

namespace Domain\Dashboard\Settings;

use Domain\Supports\Classes\Settings;
use Spatie\LaravelData\Data;

class PromotionalOfferSetting extends Settings
{
    public float $price;

    public static function group(): string
    {
        return 'promotional_offer';
    }
}
