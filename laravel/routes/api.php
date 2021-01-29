<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class,'index']);
    Route::get('/{id}', [UserController::class,'show']);
    Route::put('/', [UserController::class, 'update']);
    Route::patch('/', [UserController::class, 'update']);
    Route::post('/', [UserController::class, 'store']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});
