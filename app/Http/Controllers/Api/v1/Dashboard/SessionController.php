<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use Domain\Dashboard\Actions\Sessions\LoginAction;
use Domain\Dashboard\Actions\Sessions\LogoutAction;
use Domain\Dashboard\DataTransferToObject\Sessions\LoginData;
use Illuminate\Http\JsonResponse;

class SessionController extends Controller
{

    public function login(LoginData $request): JsonResponse
    {
        $admin = app(LoginAction::class)($request);

        return sendSuccessResponse(data: $admin);
    }


    public function logout(): JsonResponse
    {
        app(LogoutAction::class);

        return sendSuccessResponse();
    }
}
