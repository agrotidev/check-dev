<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});


// ADMIN
Route::prefix('admin')->name('admin.')->group(function () {

    // AUTH ADMIN
    Route::get('/login', [AuthAdminController::class, 'index'])->name('login');
    Route::post('/login', [AuthAdminController::class, 'login'])->name('login');
    Route::get('/logout', function () {
        Auth::guard('admin')->logout();
        return redirect()->action([AuthAdminController::class, 'login']);
    })->name('logout');

    // RECOVER PASSWORD ADMIN
    Route::get('/forgot', [AuthAdminController::class, 'showForgot'])->name('forgot');
    Route::post('/forgot', [AuthAdminController::class, 'sendForgot'])->name('forgot');
    Route::get('/reset/{token}', [AuthAdminController::class, 'showResetPassword'])->name('reset.token');
    Route::post('/reset', [AuthAdminController::class, 'sendResetPassword'])->name('reset');

    // ADMIN DASHBOARD
    Route::get('/', [AdminController::class, 'index'])->name('dash');
});
