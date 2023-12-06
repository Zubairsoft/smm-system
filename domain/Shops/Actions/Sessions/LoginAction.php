<?php

namespace Domain\Shops\Actions\Sessions;

use App\Exceptions\LogicException;
use App\Models\Shop;
use Domain\Shops\DataTransferToObject\Sessions\LoginData;
use Domain\Shops\Specifications\Shops\ActivatedAccount;
use Domain\Shops\Specifications\Shops\VerifiedEmail;
use Domain\Shops\Specifications\Shops\VerifiedPhone;

class LoginAction
{
    public function __invoke(LoginData $data): Shop
    {
        $shop = Shop::where('email', $data->email)->first();

        throw_if(!password_verify($data->password, $shop->password), new LogicException(__('auth.failed'), 403));

        throw_if(!(new VerifiedEmail($shop))->isAllow(), new LogicException(__('auth.verify_email'), 403, 'email'));

        throw_if(!(new VerifiedPhone($shop))->isAllow(), new LogicException(__('auth.phone'), 422, 'phone'));

        throw_if(!(new ActivatedAccount($shop))->isAllow(), new LogicException(__('auth.not_activated_account'), 422, 'email'));

        $shop['token'] = $shop->createToken('shopAccessToken')->plainTextToken;

        return $shop;
    }
}
