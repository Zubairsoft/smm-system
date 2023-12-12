<?php

use App\Exceptions\LogicException;
use App\Models\Admin;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

function defaultPassword()
{
    return "0000";
}

function isFile($file): bool
{
    return $file instanceof UploadedFile;
}

function generateOtp()
{
    return rand(100000, 999999);
}

function isExpire(string $date, int $hours = 1): bool
{
    return Carbon::parse($date)->addHours($hours)->isPast();
}

function currentUser(string $guard): Shop|User|Admin
{
    if (!in_array($guard, array_keys(config('auth.guards')))) {
        throw new LogicException('invalid guard', 403);
    }

    return Auth::guard($guard)->user();
}
