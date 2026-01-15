<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = [
        'nombre',
        'marca',
        'numero_serie',
        'categoria',
        'estado',
    ];

    // Relación con los préstamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'equipo_id');
    }
}
