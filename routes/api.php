<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('books', BookController::class)->except([
        'create', 'edit'
    ]);

    Route::resource('stores', StoreController::class)->except([
        'create', 'edit'
    ]);

    Route::post('logout', [AuthController::class, 'logout']);
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [RegisterController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});