<?php

namespace App\Routes\Transaction;

use App\Http\Controllers\V1\Transaction\TransactionController;
use Illuminate\Support\Facades\Route;

class TransactionRoutes
{
    public static function routes() : void
    {
        Route::apiResource('transaction', TransactionController::class);
    }
}
