<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shops\Profiles\ProfileResource;
use App\Models\Shop;
use Domain\Shops\DataTransferToObject\Profiles\UpdateProfileData;
use Domain\Supports\Actions\UpdateProfileAction;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function show(): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), ProfileResource::make($this->getCurrentShop()));
    }

    public function update(UpdateProfileData $request): JsonResponse
    {
        $shop = app(UpdateProfileAction::class)($this->getCurrentShop(), $request);

        return sendSuccessResponse(__('messages.update_data'), ProfileResource::make($shop));
    }

    private function getCurrentShop(): Shop
    {
        return  currentUser(config('auth.shop-api-guard'));
    }
}
