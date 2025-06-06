<?php

namespace App\Routes;

use App\Http\Controllers\V1\BillController;
use Illuminate\Support\Facades\Route;

class BillRoutes
{
    public static function routes() : void
    {
        Route::apiResource('bill', BillController::class);
    }
}
