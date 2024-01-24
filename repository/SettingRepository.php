<?php

namespace Repository;

use Domain\Supports\Classes\Settings;
use Spatie\LaravelData\Data;

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
