<?php

namespace Domain\Dashboard\Actions\Sessions;

use App\Exceptions\LogicException;
use App\Models\Admin;
use Domain\Dashboard\DataTransferToObject\Sessions\LoginData;
use Illuminate\Support\Facades\Hash;

final class LoginAction
{
    public function __invoke(LoginData $data): Admin
    {
        $admin = Admin::where('phone', $data->phone)->first();

        throw_if(!password_verify($data->password, $admin->password), new LogicException(__('auth.failed'), 403));

        $admin['token'] = $admin->createToken('adminAccessToken')->plainTextToken;

        return $admin;
    }
}
