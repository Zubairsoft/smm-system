<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Dashboard\Actions\Sessions\LogoutAction;
use Domain\Shops\Actions\Sessions\LoginAction;
use Domain\Shops\DataTransferToObject\Sessions\LoginData;
use Domain\Shops\Actions\Sessions\RegisterAction;
use Domain\Shops\Actions\Sessions\ResendEmailVerificationCodeAction;
use Domain\Shops\DataTransferToObject\Sessions\RegisterData;
use Domain\Shops\DataTransferToObject\Sessions\ResendEmailVerificationCodeData;
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

    public function sendEmailVerificationCode(ResendEmailVerificationCodeData $request): JsonResponse
    {
        $email = app(ResendEmailVerificationCodeAction::class)($request);

        return sendSuccessResponse(__('auth.send_verification_code'), $email);
    }

    public function logout(): JsonResponse
    {
        app(LogoutAction::class)();

        return sendSuccessResponse(__('auth.logout'));
    }
}
