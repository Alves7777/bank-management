<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\FinancialSummaryController;

class FinancialSummaryRoutes
{
    public static function routes()
    {
        Route::post('financial-summary', FinancialSummaryController::class);
    }
}
