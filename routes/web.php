<?php

use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
})->name('index'); // se da nome pra rota para poder chamar ela depois(no route(), por exemplo)

Route::get('/funcionarios', [FuncionariosController::class, 'index'])->name('funcionarios');

Route::get('/funcionarios/ver/{func}', [FuncionariosController::class, 'ver'])->name('funcionarios/ver');

Route::get('/funcionarios/cadastrar', [FuncionariosController::class, 'cadastrar'])->name('funcionarios/cadastrar');

Route::post('/funcionarios/cadastrar', [FuncionariosController::class, 'gravar'])->name('funcionarios/gravar');

Route::get('/funcionarios/editar/{func}', [FuncionariosController::class, 'editar'])->name('funcionarios/editar');

Route::put('/funcionarios/editar/{func}', [FuncionariosController::class, 'editarGravar']);

Route::get('/funcionarios/apagar/{func}', [FuncionariosController::class, 'apagar'])->name('funcionarios/apagar'); 

Route::delete('funcionarios/apagar/{func}', [FuncionariosController::class, 'deletar']);

//----------------------------------------------------------------------------------------------------------------------

Route::prefix('usuarios')->middleware('auth')->group(function() {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');

    Route::get('/cadastrar', [UsuariosController::class, 'cadastrar'])->name('usuarios/cadastrar');
    
    Route::post('/cadastrar', [UsuariosController::class, 'gravar'])->name('usuarios/gravar');
    
    Route::get('/editar/{user}', [UsuariosController::class, 'editar'])->name('usuarios/editar');
    
    Route::put('/editar/{user}', [UsuariosController::class, 'editarGravar']);
    
    Route::get('/apagar/{user}', [UsuariosController::class, 'apagar'])->name('usuarios/apagar'); 
    
    Route::delete('/apagar/{user}', [UsuariosController::class, 'deletar']);
});


//----------------------------------------------------------------------------------------------------------------------

Route::get('/login', [UsuariosController::class, 'login'])->name('login');

Route::post('/login', [UsuariosController::class, 'login']);

Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');