<?php

namespace Domain\Shops\Actions\Sessions;

use App\Models\Shop;
use Domain\Shops\DataTransferToObject\Sessions\ResendEmailVerificationCodeData;

class ResendEmailVerificationCodeAction
{
    public function __invoke(ResendEmailVerificationCodeData $data): array
    {
        $shop = Shop::query()->where('email', $data->email)->firstOrFail();

        $shop->sendEmailVerification();

        return ['email' => $shop->email];
    }
}
