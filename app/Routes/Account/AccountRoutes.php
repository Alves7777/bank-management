<?php

namespace App\Routes\Account;

use App\Http\Controllers\V1\Account\AccountController;
use Illuminate\Support\Facades\Route;

class AccountRoutes
{
    public static function routes(): void
    {
        Route::apiResource('account', AccountController::class);
    }
}
