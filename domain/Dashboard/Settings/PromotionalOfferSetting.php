<?php

namespace Domain\Dashboard\Settings;

use Spatie\LaravelData\Data;
use Spatie\LaravelSettings\Settings;

class PromotionalOfferSetting extends Settings
{
    public float $price;

    public static function group(): string
    {
        return 'promotional_offer';
    }

    public function update(array $data): self
    {
        if (count($data) > 0) {

            foreach ($data as $property => $value) {
                $this->{$property} = $value;
            }
            $this->save();
        }

        return $this;
    }
}
