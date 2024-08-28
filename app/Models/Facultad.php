<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    protected $table = 'facultades';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'nombre',
        'codigo',
    ];

    /**
     * Obtener las carreras asociadas a la facultad.
     */
    public function carreras()
    {
        return $this->hasMany(Carrera::class);
    }
}
