<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});


Route::post('/login-authenticator', [LoginController::class, 'login']);