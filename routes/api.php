<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('requests')->controller(BidController::class)->group(function () {
    Route::get('', 'index');
    Route::post('', 'store');
    Route::put('/{id}', 'update');
});

