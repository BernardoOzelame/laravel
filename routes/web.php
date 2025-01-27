<?php

use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
})->name('index'); // se da nome pra rota para poder chamar ela depois(no route(), por exemplo)

//----------------------------------------------------------------------------------------------------------------------

Route::get('/semPermissao', function () {
    return view('semPermissao');
})->name('semPermissao');

//----------------------------------------------------------------------------------------------------------------------

Route::prefix('funcionarios')->middleware('auth')->group(function() {
    Route::get('/', [FuncionariosController::class, 'index'])->name('funcionarios');
    Route::get('/ver/{func}', [FuncionariosController::class, 'ver'])->name('funcionarios/ver');
    Route::get('/cadastrar', [FuncionariosController::class, 'cadastrar'])->name('funcionarios/cadastrar');
    Route::post('/cadastrar', [FuncionariosController::class, 'gravar'])->name('funcionarios/gravar');
    Route::get('/editar/{func}', [FuncionariosController::class, 'editar'])->name('funcionarios/editar');
    Route::put('/editar/{func}', [FuncionariosController::class, 'editarGravar']);
    Route::get('/apagar/{func}', [FuncionariosController::class, 'apagar'])->name('funcionarios/apagar'); 
    Route::delete('/apagar/{func}', [FuncionariosController::class, 'deletar']);
});

//----------------------------------------------------------------------------------------------------------------------

Route::prefix('usuarios')->middleware(['auth', 'can:isAdmin'])->group(function() {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');
    Route::get('/cadastrar', [UsuariosController::class, 'cadastrar'])->name('usuarios/cadastrar');
    Route::post('/cadastrar', [UsuariosController::class, 'gravar'])->name('usuarios/gravar');
    Route::get('/editar/{user}', [UsuariosController::class, 'editar'])->name('usuarios/editar');
    Route::put('/editar/{user}', [UsuariosController::class, 'editarGravar']);
    Route::get('/apagar/{user}', [UsuariosController::class, 'apagar'])->name('usuarios/apagar'); 
    Route::delete('/apagar/{user}', [UsuariosController::class, 'deletar']);
});

//----------------------------------------------------------------------------------------------------------------------

Route::prefix('login')->group(function() {
    Route::get('/', [UsuariosController::class, 'login'])->name('login');
    Route::post('/', [UsuariosController::class, 'login']);
});

//----------------------------------------------------------------------------------------------------------------------

Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');