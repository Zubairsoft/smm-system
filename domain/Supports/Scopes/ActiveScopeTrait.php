<?php

namespace Domain\Supports\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait ActiveScopeTrait
{
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeDisActive(Builder $query): Builder
    {
        return $query->where('is_active', false);
    }
}
