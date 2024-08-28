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
    public function show(Facultad $facultad)
    {
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
    public function update(Request $request, Facultad $facultad)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:facultades,codigo,' . $facultad->id,
        ]);
    
        $facultad->update($request->all());
    
        return redirect()->route('facultades.index')
                        ->with('success', 'Facultad actualizada exitosamente.');
    }

    /**
     * Eliminar la facultad especificada de la base de datos.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facultad $facultad)
    {
        $facultad->delete();
    
        return redirect()->route('facultades.index')
                        ->with('success', 'Facultad eliminada exitosamente.');
    }
}
