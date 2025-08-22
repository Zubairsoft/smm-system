<?php

namespace Domain\Dashboard\Actions\NotificationTemplates;

use Illuminate\Database\Eloquent\Builder;

trait ActivateScope
{
    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive(Builder $query)
    {
        return $query->where('is_active', false);
    }
}
