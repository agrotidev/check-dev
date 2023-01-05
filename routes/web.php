<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashAdminController;
use App\Http\Controllers\Admin\Auth\AuthAdminController;
use App\Http\Controllers\Admin\DepartamentoController;
use App\Http\Controllers\Admin\SetorController;
use App\Http\Controllers\Admin\Imports\DepartamentoImportController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Manager\Auth\AuthManagerController;
use App\Http\Controllers\Manager\ChecklistController;
use App\Http\Controllers\Manager\ChecklistGrupoController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\TarefasChecklistController;
use App\Http\Controllers\TesteAgrupamentoController;
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

        // CHECKLIST GRUPOS
        Route::get('/check-group/{id}', [TesteAgrupamentoController::class, 'index'])->name('agrupamento.teste.index');
        Route::get('/checklist-grupo/grupo/{id}', [ChecklistGrupoController::class, 'show'])->name('checklist.grupo.show');
        Route::post('/checklist-grupo', [ChecklistGrupoController::class, 'store'])->name('checklist.grupo.store');
        Route::get('/checklist-grupo/create', [ChecklistGrupoController::class, 'create'])->name('checklist.grupo.create');
        Route::get('/checklist-grupo', [ChecklistGrupoController::class, 'index'])->name('checklist.grupo.index');

        // CHECKLIST TAREFAS
        Route::post('/checklist/{id}/tarefas', [TarefasChecklistController::class, 'store'])->name('checklist.tarefas.store');
        Route::get('/checklist/{checklist}/tarefa/create', [TarefasChecklistController::class, 'create'])->name('checklist.tarefas.create');
        Route::get('/checklist/{id}/tarefas', [TarefasChecklistController::class, 'index'])->name('checklist.tarefas.index');

        // CHECKLIST
        Route::put('/checklist/{id}/editar', [ChecklistController::class, 'update'])->name('checklist.update');
        Route::get('/checklist/{id}/editar', [ChecklistController::class, 'edit'])->name('checklist.edit');
        Route::post('/checklist', [ChecklistController::class, 'store'])->name('checklist.store');
        Route::get('/checklist/create', [ChecklistController::class, 'create'])->name('checklist.create');
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
    Route::get('/', [DashAdminController::class, 'index'])->name('dash');



    // DEPARTAMENTO
    Route::put('/departamento/{cod_departamento}/editar', [DepartamentoController::class, 'update'])->name('departamento.update');
    Route::get('/departamento/{cod_deparmento}/editar', [DepartamentoController::class, 'edit'])->name('departamento.edit');
    Route::delete('/departamento/{cod_departamento}', [DepartamentoController::class, 'destroy'])->name('departamento.destroy');
    Route::post('/departamento/create', [DepartamentoController::class, 'store'])->name('departamento.store');
    Route::get('/departamento/create', [DepartamentoController::class, 'create'])->name('departamento.create');
    Route::get('/departamento', [DepartamentoController::class, 'index'])->name('departamento.index');

    // SETOR
    Route::put('/setor/{id}/editar', [SetorController::class, 'update'])->name('setor.update');
    Route::get('/setor/{id}/editar', [SetorController::class, 'edit'])->name('setor.edit');
    Route::delete('/setor/{cod_setor}', [Setor::class, 'destroy'])->name('setor.destory');
    Route::post('/setor/create', [SetorController::class, 'store'])->name('setor.store');
    Route::get('/setor/create', [SetorController::class, 'create'])->name('setor.create');
    Route::get('/setor', [SetorController::class, 'index'])->name('setor.index');

    // IMPORT
    Route::post('/import/departamento', [DepartamentoImportController::class, 'importExcel'])->name('import.departamento.xls');
    Route::get('/import/departamento', [DepartamentoImportController::class, 'index'])->name('import.departamento.index');


    // USUARIO
    Route::put('/usuario/{id}/editar', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::get('/usuario/{id}/editar', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::post('/usuario/create', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');

    // USUARIO
    Route::post('/administrators/create', [AdminController::class, 'store'])->name('administrador.store');
    Route::get('/administrators/create', [AdminController::class, 'create'])->name('administrador.create');
    Route::get('/administrators', [AdminController::class, 'index'])->name('administrador.index');

});
