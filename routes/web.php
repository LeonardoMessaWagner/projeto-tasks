<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\LoginController::class, 'verificacao'])->name('home');

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');


Route::middleware(['auth'])->group(function () {
    Route::get('/tarefas', [\App\Http\Controllers\TarefaController::class, 'view'])->name('tarefas');
    Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::prefix('/tarefa')->group(function () {
        Route::post('/create', [\App\Http\Controllers\TarefaController::class, 'create'])->name('create_tarefa');
        Route::get('/details/{id}', [\App\Http\Controllers\TarefaController::class,'details'])->name('view_details');
        Route::post('change_responsible', [\App\Http\Controllers\TarefaController::class,'change_responsible'])->name('change_responsible');
        Route::post('finish', [\App\Http\Controllers\TarefaController::class,'finish'])->name('finish');
    });
    Route::prefix('observacoes')->group(function (){
        Route::post('create', [\App\Http\Controllers\ObservacaoController::class,'create'])->name('create_observacao');
        Route::post('update', [\App\Http\Controllers\ObservacaoController::class,'update'])->name('update_observacao');
    });
});