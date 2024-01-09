<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Shops\DataTransferToObject\Profiles\UpdateProfileData;
use Domain\Supports\Actions\UpdateProfileAction;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function show(): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), currentUser(config('auth.shop-api-guard')));
    }

    public function update(UpdateProfileData $request): JsonResponse
    {
        $shop = app(UpdateProfileAction::class)($request);

        return sendSuccessResponse(__('messages.update_data'), $shop);
    }
}
