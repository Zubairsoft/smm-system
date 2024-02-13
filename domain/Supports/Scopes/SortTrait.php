<?php

namespace Domain\Supports\Scopes;

use App\Exceptions\LogicException;
use Illuminate\Database\Eloquent\Builder;

trait SortTrait
{
    public function scopeSort(Builder $query, array $allowedSorts, $sorts): Builder
    {

        foreach ($sorts as $key => $value) {

            throw_if(!array_key_exists($key, $allowedSorts), new LogicException(__('exceptions.not_allowed_sort', ['attribute' => $key])));
            
            $query->orderBy($key, $value);
        };

        return $query;
    }
}
