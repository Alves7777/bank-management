<?php

namespace App\Routes\Transaction;

use App\Http\Controllers\V1\Transaction\CustomTransactionController;
use Illuminate\Support\Facades\Route;

class CustomTransactionRoutes
{
    public static function routes() : void
    {
        Route::apiResource('custom-transaction', CustomTransactionController::class);
    }
}
