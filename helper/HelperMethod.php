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
