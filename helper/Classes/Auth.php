<?php

namespace Helper\Classes;

use App\Exceptions\LogicException;
use Illuminate\Database\Eloquent\Model;

class Auth
{
    private static string $encryptedFailed = 'password';

    public static function check($model, array $credentials, string $encryptedFailed = null): bool
    {
        $model = app($model);

        $encryptedFailed = $encryptedFailed ?: self::$encryptedFailed;

        throw_if(!($model instanceof Model), new LogicException());

        $encryptedFailedValue = $credentials[$encryptedFailed];

        unset($credentials, $credentials[$encryptedFailed]);

        $credentials = array_map(fn ($key, $value) => [$key, '=', $value], array_keys($credentials), array_values($credentials));

        $auth = $model->where($credentials)->first();

        return  password_verify($encryptedFailedValue, $auth->password);
    }
}
