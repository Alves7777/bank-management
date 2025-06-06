<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\FinancialSummarySnapshotController;

class FinancialSummarySnapshotRoutes
{
    public static function routes()
    {
        Route::get('financial-summary-snapshots', [FinancialSummarySnapshotController::class, 'index']);
        Route::post('financial-summary-snapshots', [FinancialSummarySnapshotController::class, 'store']);
    }
}
