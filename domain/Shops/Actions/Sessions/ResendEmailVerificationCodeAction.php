<?php

namespace Domain\Shops\Actions\Sessions;

use App\Exceptions\LogicException;
use App\Models\Shop;
use Domain\Shops\DataTransferToObject\Sessions\ResendEmailVerificationCodeData;
use Helper\Classes\Verification;

class ResendEmailVerificationCodeAction
{
    public function __invoke(ResendEmailVerificationCodeData $data): array
    {
        $shop = Shop::query()->where('email', $data->email)->firstOrFail();

        Verification::sendVerificationEmailCode(model:$shop,email:$data->email);

        return ['email' => $shop->email];
    }
}
