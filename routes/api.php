<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('requests')->controller(BidController::class)->group(function () {
    Route::get('', 'index');
    Route::post('', 'store');
    Route::put('/{id}', 'update');
});

//Route::controller(BidController::class)->group(function () {
//    Route::post('/requests', 'store');
//    Route::get('/requests', 'index');
//});

//Route::post('/requests', [BidController::class, 'store']);
//Route::get('/requests', [BidController::class, 'index']);
//Route::put('/{id}', [BidController::class, 'update']);
