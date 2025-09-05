<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Captura los datos del formulario
        $username = $request->input('username');
        $password = $request->input('password');

        // Por ahora, solo probamos mostrando lo que recibimos
        return "Usuario: $username, Password: $password";
    }
}
