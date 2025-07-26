<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\RestaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('inicio', function (){
    return view('inicio');
});

// Route::get('/suma', function (){
//     return view('suma');
// });

Route::get('/suma', [SumaController::class, 'index']);

Route::post('/suma', [SumaController::class, 'suma']);

route::get('/resta', [RestaController::class, 'index']);

route::post('/resta', [RestaController::class, 'resta']);

Route::get('/productos', [ProductoController::class, 'index']);