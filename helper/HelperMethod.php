<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;

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
