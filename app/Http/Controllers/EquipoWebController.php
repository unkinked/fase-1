<?php

namespace App\Http\Controllers;

use App\Models\Equipo; // Modelo Equipo

class EquipoWebController extends Controller
{
    public function index()
    {
        $equipos = Equipo::all();
        return view('equipos.index', compact('equipos'));
    }
}
