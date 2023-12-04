<?php

namespace Domain\Shops\Actions\Sessions;

use App\Exceptions\LogicException;
use App\Models\Shop;
use Domain\Shops\DataTransferToObject\Sessions\LoginData;

class LoginAction
{
    public function __invoke(LoginData $data): Shop
    {
        $shop = Shop::where('email', $data->email)->first();

        throw_if(!password_verify($data->password, $shop->password), new LogicException(__('auth.failed'), 403));

        $shop['token'] = $shop->createToken('shopAccessToken')->plainTextToken;

        return $shop;
    }
}
