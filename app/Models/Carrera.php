<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'facultad_id',
        'duracion',
    ];

    /**
     * Obtener la facultad a la que pertenece la carrera.
     */
    public function facultad()
    {
        return $this->belongsTo(Facultad::class);
    }

    /**
     * Obtener las asignaturas de la carrera.
     */
    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }
}
