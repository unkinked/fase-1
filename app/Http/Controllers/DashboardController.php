<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Prestamo;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEquipos = Equipo::count();

        $equiposDisponibles = Equipo::where('estado', 'libre')->count();
        $equiposEnUso = Equipo::where('estado', 'en uso')->count();
        $equiposReparacion = Equipo::where('estado', 'reparacion')->count();
        $equiposBaja = Equipo::where('estado', 'dado_de_baja')->count();

        $prestamosActivos = Prestamo::whereNull('fecha_devolucion')->count();


        return view('dashboard.index', compact(
            'totalEquipos',
            'equiposDisponibles',
            'equiposEnUso',
            'equiposReparacion',
            'equiposBaja',
            'prestamosActivos'
        ));
    }
}
