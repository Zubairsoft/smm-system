<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Dashboard\Actions\Sessions\LogoutAction;
use Domain\Shops\Actions\Sessions\ActivateEmailAction;
use Domain\Shops\Actions\Sessions\ActivatePhoneAction;
use Domain\Shops\Actions\Sessions\LoginAction;
use Domain\Shops\DataTransferToObject\Sessions\LoginData;
use Domain\Shops\Actions\Sessions\RegisterAction;
use Domain\Shops\Actions\Sessions\ResendEmailVerificationCodeAction;
use Domain\Shops\Actions\Sessions\ResendPhoneVerificationCodeAction;
use Domain\Shops\DataTransferToObject\Sessions\ActivateEmailData;
use Domain\Shops\DataTransferToObject\Sessions\ActivatePhoneData;
use Domain\Shops\DataTransferToObject\Sessions\RegisterData;
use Domain\Shops\DataTransferToObject\Sessions\ResendEmailVerificationCodeData;
use Domain\Shops\DataTransferToObject\Sessions\ResendPhoneVerificationCodeData;
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

        return sendSuccessResponse(message: __('auth.success_login'), data: $shop);
    }

    public function resendEmailVerificationCode(ResendEmailVerificationCodeData $request): JsonResponse
    {
        $email = app(ResendEmailVerificationCodeAction::class)($request);

        return sendSuccessResponse(__('auth.send_verification_code'), $email);
    }

    public function activateEmail(ActivateEmailData $request): JsonResponse
    {
        $email = app(ActivateEmailAction::class)($request);

        return sendSuccessResponse(__('auth.email_verified'), $email);
    }

    public function resendPhoneVerificationCode(ResendPhoneVerificationCodeData $request): JsonResponse
    {
        $phone = app(ResendPhoneVerificationCodeAction::class)($request);

        return sendSuccessResponse(__('auth.send_phone_verification_code'), $phone);
    }

    public function activatePhone(ActivatePhoneData $request): JsonResponse
    {
        $phone = app(ActivatePhoneAction::class)($request);

        return sendSuccessResponse(__('auth.phone_verified'), $phone);
    }

    public function logout(): JsonResponse
    {
        app(LogoutAction::class)();

        return sendSuccessResponse(__('auth.logout'));
    }
}
