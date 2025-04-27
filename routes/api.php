<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route untuk mendapatkan data user yang sedang login (Authenticated User)
Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });

    Route::get('/produk', [ProductController::class, 'index']);
    Route::post('/produk', [ProductController::class, 'store']);
    Route::get('/produk/{id}', [ProductController::class, 'show']);
    Route::put('/produk/{id}', [ProductController::class, 'update']);
    Route::delete('/produk/{id}', [ProductController::class, 'destroy']);
});
