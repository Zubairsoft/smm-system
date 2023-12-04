<?php

namespace Helper\Classes;

use App\Exceptions\LogicException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\HasMedia;

class File
{
    public static function StoreMedia(Model $model, UploadedFile $file, string $collection): void
    {
        if (!$model instanceof HasMedia) {
            throw new LogicException();
        }

        $model->addMedia($file)->toMediaCollection($collection);
    }
}
