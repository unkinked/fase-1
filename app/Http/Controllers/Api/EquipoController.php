<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Http\Requests\StoreEquipoRequest;

class EquipoController extends Controller
{
    
    public function store(StoreEquipoRequest $request)
    {
       
        $equipo = Equipo::create($request->validated());
        
        return response()->json($equipo, 201);
    }

    
    public function destroy($id)
    {
        
        $equipo = Equipo::findOrFail($id);
        
        
        $equipo->delete();

        
        return response()->json([
            'message' => 'Equipo eliminado correctamente (soft delete)'
        ]);
    }

   
    public function index()
    {
        $equipos = Equipo::all();

        return view('equipos.index', compact('equipos'));
    }

    
    public function usuario($id)
    {
        // Cargar el equipo con sus préstamos y los usuarios asociados
        $equipo = Equipo::with('prestamos.usuario')->find($id);

        // Si no se encuentra el equipo, devolver un error 404
        if (!$equipo) {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }

        // Buscar el préstamo activo más reciente
        $prestamo = $equipo->prestamos
            ->where('estado', 'activo')
            ->sortByDesc('fecha_prestamo')
            ->first();

        // Si no hay préstamo activo, devolver mensaje de error
        if (!$prestamo) {
            return response()->json(['message' => 'El equipo no está prestado actualmente'], 404);
        }

        // Devolver los datos del equipo y el usuario asociado al préstamo
        return response()->json([
            'equipo' => $equipo->nombre,
            'usuario' => $prestamo->usuario,  // Ya no es necesario usar el ?? null
            'fecha_prestamo' => $prestamo->fecha_prestamo,
        ]);
    }
}
