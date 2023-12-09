<?php

namespace Domain\Shops\Actions\Sessions;

use App\Models\Shop;
use Domain\Shops\DataTransferToObject\Sessions\ResendPhoneVerificationCodeData;
use Helper\Classes\Verification;

class ResendPhoneVerificationCodeAction
{
    public function __invoke(ResendPhoneVerificationCodeData $data): array
    {
        $shop = Shop::query()->findOrFail($data->id);

        Verification::sendVerificationPhoneCode(model:$shop,phone:$data->phone);

        return [
            'id' => $data->id,
            'phone' => $data->phone
        ];
    }
}
