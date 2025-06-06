<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;

class CategoryRoutes
{
    public static function routes() : void
    {
        Route::apiResource('category', \App\Http\Controllers\V1\CategoryController::class);
    }
}
