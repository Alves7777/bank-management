<?php

namespace App\Routes\Api;

use App\Http\Controllers\V1\BankController;
use Illuminate\Support\Facades\Route;

class BankRoutes
{
    public static function routes() : void
    {
        Route::apiResource('bank', BankController::class);
    }
}
