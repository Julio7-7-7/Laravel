<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::all();
        return view('gestionar-categoria', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('crear-categoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(['categoria'=>'in:ingreso,egreso'],['categoria.in'=>'Elija tipo de categoria']);
        Categoria::create([
            'nombre' => $request->input('nombre'),
            'tipo' => $request->input('categoria')
        ]);
        return redirect()->route('categoria.index')->with('success', 'Categoria creada exitosamente.');
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
        $categoria = Categoria::where('id', $id)->firstOrFail();
        return view('editar-categoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(['categoria'=>'in:ingreso,egreso'],['categoria.in'=>'Elija tipo de categoria']);

        $categoria = Categoria::where('id', $id)->firstOrFail();
        $categoria->update([
            'nombre' => $request->input('nombre'),
            'tipo' => $request->input('categoria')
        ]);
        return redirect()->route('categoria.index')->with('success', 'Categoria actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
