<?php

use Spatie\LaravelSettings\Migrations\SettingsBlueprint;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->inGroup('promotional_offer', function (SettingsBlueprint $blueprint): void {
            $blueprint->add('price', 100);
        });
    }
};
