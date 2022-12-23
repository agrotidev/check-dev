<?php

use App\Http\Controllers\Api\Off\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('off')->group(function() {
    Route::prefix('v1')->group(function() {

        // Autenticação
        Route::post('/login', [AuthController::class, 'login'])->name('api.off.login');

    });
});