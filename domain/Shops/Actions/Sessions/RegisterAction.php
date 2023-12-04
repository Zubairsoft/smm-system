<?php

namespace Domain\Shops\Actions\Sessions;

use App\Models\Shop;
use Domain\Shops\DataTransferToObject\Sessions\RegisterData;
use Helper\Classes\File;

class RegisterAction
{
    public function __invoke(RegisterData $data): Shop
    {
        $shop = Shop::query()->create($data->toArray());

        File::StoreMedia($shop, $data->avatar, 'avatar');

        return $shop;
    }
}
