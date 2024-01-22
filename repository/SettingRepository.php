<?php

namespace Repository;

use Illuminate\Http\JsonResponse;
use Spatie\LaravelData\Data;
use Spatie\LaravelSettings\Settings;

class SettingRepository
{

    public function __construct(private Settings $settings)
    {
    }

    public function update(Data $data): Settings
    {
        $this->settings->update($data->toArray());

        return $this->settings;
    }
}
