<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use SoftDeletes;

    
    protected $fillable = [
        'marca',
        'nombre',
        'numero_serie',
        'categoria',
        'estado',
    ];

    
    protected $dates = ['deleted_at'];
}
