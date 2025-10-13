<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuario = Auth::user();
        $registros = Registro::with('categoria')->where('id_usuario', $usuario->id)->get();
        return view('registros-economicos', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return view('crear-registro', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $categoria = Categoria::where('id', $request->input('categoria'))->firstOrFail();
        $usuario = Auth::user();
        $registro = Registro::create([
            'descripcion' => $request->input('descripcion'),
            'fecha' => $request->input('fecha'),
            'monto' => $request->input('monto'),
            'id_usuario' => $usuario->id,
            'id_categoria' => $categoria->id
        ]);

        if ($categoria->tipo === 'ingreso') {
            $usuario->saldo += $registro->monto;
        } elseif ($categoria->tipo === 'egreso') {
            $usuario->saldo -= $registro->monto;
        }

        $usuario->save();

        return redirect()->route('registro.index')->with('success', 'Registro creado exitosamente.');
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
        $registro = Registro::with('categoria')->where('id', $id)->firstOrFail();
        $categorias = Categoria::where('id', '!=', $registro->id_categoria)->get();
        return view('editar-registro', compact('registro', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $categoria = Categoria::where('id', $request->input('categoria'))->firstOrFail();
        $registro = Registro::with('categoria')->where('id', $id)->firstOrFail();
        $usuario = Auth::user();
        if ($registro->categoria->tipo === 'ingreso') {
            $usuario->saldo -= $registro->monto;
        } elseif ($registro->categoria->tipo === 'egreso') {
            $usuario->saldo += $registro->monto;
        }
        $usuario->save();

        $registro->update([
            'descripcion' => $request->input('descripcion'),
            'fecha' => $request->input('fecha'),
            'monto' => $request->input('monto'),
            'id_usuario' => $usuario->id,
            'id_categoria' => $categoria->id
        ]);

        if ($categoria->tipo === 'ingreso') {
            $usuario->saldo += $registro->monto;
        } elseif ($categoria->tipo === 'egreso') {
            $usuario->saldo -= $registro->monto;
        }
        $usuario->save();



        return redirect()->route('registro.index')->with('success', 'Registro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
