<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;

Route::resource('books', BookController::class)->except([
    'create', 'edit'
]);

Route::resource('stores', StoreController::class)->except([
    'create', 'edit'
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
