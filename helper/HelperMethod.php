<?php

use App\Exceptions\LogicException;
use App\Models\Admin;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;

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

    $user = Auth::guard($guard)->user();

    if (!$user) {
        throw new AuthenticationException();
    }

    return $user;
}

function addMultipleMedia($model, array $media,string $collection)
{
    $model->addMultipleMediaFromRequest($media)
        ->each(
            fn ($fileAdder) =>
            $fileAdder->toMediaCollection($collection)
        );
}
