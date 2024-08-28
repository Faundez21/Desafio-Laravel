<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Facultad;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Mostrar una lista de las carreras.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::with('facultad')->latest()->paginate(5);
    
        return view('carreras.index', compact('carreras'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Mostrar el formulario para crear una nueva carrera.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultades = Facultad::all();
        return view('carreras.create', compact('facultades'));
    }

    /**
     * Almacenar una nueva carrera en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:carreras,codigo',
            'facultad_id' => 'required|exists:facultades,id',
            'duracion' => 'required|integer',
        ]);
    
        Carrera::create($request->all());
     
        return redirect()->route('carreras.index')
                        ->with('success', 'Carrera creada exitosamente.');
    }

    /**
     * Mostrar la carrera especificada.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        return view('carreras.show', compact('carrera'));
    }

    /**
     * Mostrar el formulario para editar la carrera especificada.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        $facultades = Facultad::all();
        return view('carreras.edit', compact('carrera', 'facultades'));
    }

    /**
     * Actualizar la carrera especificada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:carreras,codigo,' . $carrera->id,
            'facultad_id' => 'required|exists:facultades,id',
            'duracion' => 'required|integer',
        ]);
    
        $carrera->update($request->all());
    
        return redirect()->route('carreras.index')
                        ->with('success', 'Carrera actualizada exitosamente.');
    }

    /**
     * Eliminar la carrera especificada de la base de datos.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
    
        return redirect()->route('carreras.index')
                        ->with('success', 'Carrera eliminada exitosamente.');
    }
}
