<?php

namespace Domain\Dashboard\Actions\Sessions;

use Illuminate\Support\Facades\Auth;

final class LogoutAction
{
    public function __invoke(): void
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
