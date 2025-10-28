<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        // Validamos los campos
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('usuario', 'password');

        // Buscamos al usuario por el campo 'username'
        $usuario = \App\Models\Usuario::where('username', $credentials['usuario'])->first();

        // Verificamos si existe y si la contraseña es correcta (hasheada)
        if ($usuario && Hash::check($credentials['password'], $usuario->password)) {
            Auth::login($usuario);
            return redirect()->route('panel.principal');
        }

        // Si falla, regresamos con error
        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas son incorrectas.',
        ])->withInput($request->except('password'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('iniciar')->with('success', 'Sesión cerrada correctamente');
    }
}
