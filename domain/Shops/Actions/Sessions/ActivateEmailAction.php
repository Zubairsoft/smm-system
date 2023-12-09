<?php

namespace Domain\Shops\Actions\Sessions;

use App\Exceptions\LogicException;
use App\Models\Shop;
use Domain\Shops\DataTransferToObject\Sessions\ActivateEmailData;

class ActivateEmailAction
{
    public function __invoke(ActivateEmailData $data): array
    {
        $shop = Shop::query()->withWhereHas(
            'verifyEmail',
            fn ($query) => $query->where([['email', $data->email], ['otp' , $data->otp]])
        )->first();

        throw_if(!$shop, new LogicException(__('auth.otp_not_correct'), 422, 'otp'));

        throw_if($shop->IsEmailVerificationCodeIsExpire(), new LogicException(__('auth.expired_otp'), 422,'otp'));

        $shop->setEmailAsVerified();

        $shop->verifyEmail->delete();

        return ['email' => $shop->email];
    }
}
