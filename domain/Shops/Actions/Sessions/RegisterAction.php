<?php

namespace Domain\Shops\Actions\Sessions;

use App\Models\Shop;
use Domain\Shops\DataTransferToObject\Sessions\RegisterData;
use Helper\Classes\File;
use Helper\Classes\Verification;

class RegisterAction
{
    public function __invoke(RegisterData $data): Shop
    {
        $shop = Shop::query()->create($data->except('phone')->toArray());

        Verification::sendVerificationPhoneCode(model:$shop,phone:$data->phone);

        File::StoreMedia($shop, $data->avatar, 'avatar');

        return $shop;
    }
}
