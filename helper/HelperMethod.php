<?php

use Illuminate\Http\UploadedFile;

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
