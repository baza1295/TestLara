<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('account')->group(function () {
    Route::post('/', [AccountController::class, 'create']);
    Route::get('/{accountId}/balance', [AccountController::class, 'balance']);
    Route::put('/block', [AccountController::class, 'block']);
});

Route::prefix('transaction')->group(function () {
    Route::post('/replenishment', [TransactionController::class, 'replenishment']);
    Route::post('/withdrawal', [TransactionController::class, 'withdrawal']);
    Route::get('/{accountId}/history', [TransactionController::class, 'history']);
});
