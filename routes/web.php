<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthAdminController;
use App\Http\Controllers\Admin\DepartamentoController;
use App\Http\Controllers\Admin\SetorController;
use App\Http\Controllers\Manager\Auth\AuthManagerController;
use App\Http\Controllers\Manager\ChecklistController;
use App\Http\Controllers\Manager\ManagerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});


// MANAGER
Route::prefix('')->group(function() {

    // AUTH
    Route::get('/login', [AuthManagerController::class, 'index'])->name('login');
    Route::post('/login', [AuthManagerController::class, 'login'])->name('manager.login');
    Route::get('/logout', function () {
        Auth::guard('web')->logout();
        return redirect()->action([AuthManagerController::class, 'login']);
    })->name('manager.logout');

    // RECOVER PASSWORD MANAGER
    Route::get('/forgot', [AuthManagerController::class, 'showForgot'])->name('manager.forgot');
    Route::post('/forgot', [AuthManagerController::class, 'sendForgot'])->name('manager.forgot');
    Route::get('/reset/{token}', [AuthManagerController::class, 'showResetPassword'])->name('manager.reset.token');
    Route::post('/reset', [AuthManagerController::class, 'sendResetPassword'])->name('manager.reset');

    

    // Checklist
    Route::prefix('dashboard')->name('manager.')->group(function () {

        // MANAGER DASHBOARD
        Route::get('/', [ManagerController::class, 'index'])->name('dash');

        // CHECKLIST
        Route::put('/checklist/{id}/editar', [ChecklistController::class, 'update'])->name('checklist.update');
        Route::get('/checklist/{id}/editar', [ChecklistController::class, 'edit'])->name('checklist.edit');
        Route::get('/checklist/create', [ChecklistController::class, 'create'])->name('checklist.create');
        Route::post('/checklist', [ChecklistController::class, 'store'])->name('checklist.store');
        Route::get('/checklist', [ChecklistController::class, 'index'])->name('checklist.index');
        
    });

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

    // DEPARTAMENTO
    Route::put('/departamento/{cod_departamento}/editar', [DepartamentoController::class, 'update'])->name('departamento.update');
    Route::get('/departamento/{cod_deparmento}/editar', [DepartamentoController::class, 'edit'])->name('departamento.edit');
    Route::delete('/departamento/{cod_departamento}', [DepartamentoController::class, 'destroy'])->name('departamento.destroy');
    Route::get('/departamento/create', [DepartamentoController::class, 'create'])->name('departamento.create');
    Route::post('/departamento', [DepartamentoController::class, 'store'])->name('departamento.store');
    Route::get('/departamento', [DepartamentoController::class, 'index'])->name('departamento.index');

    // SETOR
    Route::put('/setor/{id}/editar', [SetorController::class, 'update'])->name('setor.update');
    Route::get('/setor/{id}/editar', [SetorController::class, 'edit'])->name('setor.edit');
    Route::delete('/setor/{cod_setor}', [Setor::class, 'destroy'])->name('setor.destory');
    Route::post('/setor', [SetorController::class, 'store'])->name('setor.store');
    Route::get('/setor/create', [SetorController::class, 'create'])->name('setor.create');
    Route::get('/setor', [SetorController::class, 'index'])->name('setor.index');

});
