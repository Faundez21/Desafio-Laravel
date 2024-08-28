<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'carrera_id',
        'creditos',
    ];

    /**
     * Obtener la carrera a la que pertenece la asignatura.
     */
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
