<?php

namespace Helper\Classes;

use App\Exceptions\LogicException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;

class Verification
{
    public static function sendVerificationEmailCode(Model $model, string $email, string $key = 'email_verified_at', Notification $notification = null): Model
    {
        throw_if(!is_null($model->{$key}), new LogicException(__('auth.already_verified'), 401, 'email'));

        $model->sendEmailVerificationCode($email);

        return $model;
    }

    public static function sendVerificationPhoneCode(Model $model, string $phone, string $key = 'phone_verified_at', Notification $notification = null): Model
    {

        throw_if(!is_null($model->{$key}), new LogicException(__('auth.already_verified'), 401, 'email'));

        $model->sendPhoneVerificationCode($phone);

        return $model;
    }
}
