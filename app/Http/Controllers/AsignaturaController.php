<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Carrera;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Mostrar una lista de las asignaturas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::with('carrera')->latest()->paginate(5);
    
        return view('asignaturas.index', compact('asignaturas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Mostrar el formulario para crear una nueva asignatura.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::all();
        return view('asignaturas.create', compact('carreras'));
    }

    /**
     * Almacenar una nueva asignatura en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:asignaturas,codigo',
            'carrera_id' => 'required|exists:carreras,id',
            'creditos' => 'required|integer',
        ]);
    
        Asignatura::create($request->all());
     
        return redirect()->route('asignaturas.index')
                        ->with('success', 'Asignatura creada exitosamente.');
    }

    /**
     * Mostrar la asignatura especificada.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        return view('asignaturas.show', compact('asignatura'));
    }

    /**
     * Mostrar el formulario para editar la asignatura especificada.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        $carreras = Carrera::all();
        return view('asignaturas.edit', compact('asignatura', 'carreras'));
    }

    /**
     * Actualizar la asignatura especificada en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:asignaturas,codigo,' . $asignatura->id,
            'carrera_id' => 'required|exists:carreras,id',
            'creditos' => 'required|integer',
        ]);
    
        $asignatura->update($request->all());
    
        return redirect()->route('asignaturas.index')
                        ->with('success', 'Asignatura actualizada exitosamente.');
    }

    /**
     * Eliminar la asignatura especificada de la base de datos.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
    
        return redirect()->route('asignaturas.index')
                        ->with('success', 'Asignatura eliminada exitosamente.');
    }
}
