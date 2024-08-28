<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    /**
     * Mostrar una lista de las facultades.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultades = Facultad::latest()->paginate(5);
    
        return view('facultades.index', compact('facultades'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Mostrar el formulario para crear una nueva facultad.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facultades.create');
    }

    /**
     * Almacenar una nueva facultad en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:facultades,codigo',
        ]);
    
        Facultad::create($request->all());
     
        return redirect()->route('facultades.index')
                        ->with('success', 'Facultad creada exitosamente.');
    }

    /**
     * Mostrar la facultad especificada.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscar la facultad por ID
        $facultad = Facultad::findOrFail($id);
    
        // Retornar la vista con la facultad
        return view('facultades.show', compact('facultad'));
    }
    

    /**
     * Mostrar el formulario para editar la facultad especificada.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function edit(Facultad $facultad)
    {
        return view('facultades.edit', compact('facultad'));
    }
    
    /**
     * Actualizar la facultad especificada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:10',
        ]);
    
        // Buscar y actualizar la facultad
        $facultad = Facultad::findOrFail($id);
        $facultad->nombre = $request->input('nombre');
        $facultad->codigo = $request->input('codigo');
        $facultad->save();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('facultades.index')->with('success', 'Facultad actualizada con éxito');
    }
    
    /**
     * Eliminar la facultad especificada de la base de datos.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facultad = Facultad::findOrFail($id);
        $facultad->delete();
    
        return redirect()->route('facultades.index')
                         ->with('success', 'Facultad eliminada con éxito');
    }
    
}
