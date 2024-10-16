<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use Illuminate\Http\Request;

class ComunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunas = Comuna::all();
        return view('comuna.index', ['comunas' => $comunas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comuna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos entrantes
        $request->validate([
            'comu_nomb' => 'required|string|max:255', // Ajusta los nombres de los campos según tu base de datos
            'muni_nomb' => 'required|string|max:255',
        ]);

        // Crear una nueva comuna
        Comuna::create([
            'comu_nomb' => $request->comu_nomb,
            'muni_nomb' => $request->muni_nomb,
        ]);

        // Redirigir a la lista de comunas con un mensaje
        return redirect()->route('comunas.index')->with('success', 'Comuna creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementar según sea necesario
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comuna = Comuna::findOrFail($id);
        return view('comuna.edit', compact('comuna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos entrantes
        $request->validate([
            'comu_nomb' => 'required|string|max:255',
            'muni_nomb' => 'required|string|max:255',
        ]);

        // Buscar la comuna
        $comuna = Comuna::findOrFail($id);

        // Actualizar la comuna
        $comuna->update([
            'comu_nomb' => $request->comu_nomb,
            'muni_nomb' => $request->muni_nomb,
        ]);

        // Redirigir a la lista de comunas con un mensaje
        return redirect()->route('comunas.index')->with('success', 'Comuna actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar la comuna y eliminarla
        $comuna = Comuna::findOrFail($id);
        $comuna->delete();

        // Redirigir a la lista de comunas con un mensaje
        return redirect()->route('comunas.index')->with('success', 'Comuna eliminada con éxito.');
    }
}
