<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function currentUser(string $guard): Admin|Shop|User
    {
        return currentUser($guard);
    }
}
