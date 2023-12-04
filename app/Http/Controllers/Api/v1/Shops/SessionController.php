<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Shops\Actions\Sessions\LoginAction;
use Domain\Shops\DataTransferToObject\Sessions\LoginData;
use Domain\Shops\Actions\Sessions\RegisterAction;
use Domain\Shops\DataTransferToObject\Sessions\RegisterData;
use Illuminate\Http\JsonResponse;

class SessionController extends Controller
{
    public function register(RegisterData $request): JsonResponse
    {
        $shop = app(RegisterAction::class)($request);

        return sendSuccessResponse(message: __('auth.success_register'), data: $shop);
    }


    public function login(LoginData $request): JsonResponse
    {
        $shop = app(LoginAction::class)($request);

        return sendSuccessResponse(message: __('auth.success_register'), data: $shop);
    }
}
