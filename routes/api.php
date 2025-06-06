<?php

use App\Routes\Account\AccountRoutes;
use App\Routes\Transaction\TransactionRoutes;
use App\Routes\Transaction\CustomTransactionRoutes;
use App\Routes\CategoryRoutes;
use App\Routes\BillRoutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    AccountRoutes::routes();
    TransactionRoutes::routes();
    CustomTransactionRoutes::routes();
    CategoryRoutes::routes();
    BillRoutes::routes();
});
