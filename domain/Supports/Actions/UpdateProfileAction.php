<?php

namespace Domain\Supports\Actions;

use Spatie\LaravelData\Data;

final Class UpdateProfileAction 
{
    public function __invoke($user , Data $data)
    {
        $user->update($data->toArray());

        return $user->refresh();
    }
}