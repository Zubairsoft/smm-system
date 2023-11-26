<?php

namespace Domain\Dashboard\Actions\Sessions;

use Illuminate\Support\Facades\Auth;

final class LogoutAction
{
    public function __invoke(): void
    {
        Auth::guard(config('auth.admin-web-guard'))->user()->currentAccessToken()->delete();
    }
}
