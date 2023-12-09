<?php

namespace Domain\Shops\Actions\Sessions;

use App\Exceptions\LogicException;
use App\Models\Shop;
use App\Models\VerifyPhone;
use Domain\Shops\DataTransferToObject\Sessions\ActivatePhoneData;
use Illuminate\Support\Carbon;

class ActivatePhoneAction
{
    public function __invoke(ActivatePhoneData $data): array
    {
        $verifyPhone = VerifyPhone::query()
            ->where([['verifiable_id', $data->id], ['verifiable_type', Shop::class], ['otp' , $data->otp]])->first();

        throw_if(!$verifyPhone, new LogicException(__('auth.otp_not_correct'), 422, 'otp'));

        throw_if(isExpire($verifyPhone->created_at, 24), new LogicException(__('auth.expired_otp'), 422,'otp'));

        $shop = $verifyPhone->verifiable;

        $shop->setPhoneAsVerified($verifyPhone->phone);

        $verifyPhone->delete();

        return ['phone' => $shop->phone];
    }
}
