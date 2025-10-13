<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio-de-sesion');
})->name('iniciar');

Route::get('/registrar', [UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/crear', [UsuarioController::class, 'store'])->name('usuario.store');

Route::post('/login', [AuthController::class, 'login'])->name('login.procesar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/principal', function () {
    return view('panel-principal');
})->name('panel.principal');

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/crear', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/editar/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/{id}', [CategoriaController::class, 'update'])->name('categoria.update');

Route::get('/registro', [RegistroController::class, 'index'])->name('registro.index');
Route::get('/registro/crear', [RegistroController::class, 'create'])->name('registro.create');
Route::post('/registro/crear', [RegistroController::class, 'store'])->name('registro.store');
Route::get('/registro/editar/{idph}', [RegistroController::class, 'edit'])->name('registro.edit');
Route::put('/registro/{id}', [RegistroController::class, 'update'])->name('registro.update');
