<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Settings;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Settings\PromotionalOfferSettingResource;
use Domain\Dashboard\DataTransferToObject\Settings\UpdatePromotionalOfferSettingData;
use Domain\Dashboard\Settings\PromotionalOfferSetting;
use Illuminate\Http\JsonResponse;
use Repository\SettingRepository;

class PromotionalOfferSettingController extends Controller
{

    public function show(PromotionalOfferSetting $setting): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), PromotionalOfferSettingResource::make($setting));
    }

    public function update(UpdatePromotionalOfferSettingData $request, PromotionalOfferSetting $setting): JsonResponse
    {
        (new SettingRepository($setting))->update($request);

        return sendSuccessResponse(__('messages.get_data'), PromotionalOfferSettingResource::make($setting));
    }
}
