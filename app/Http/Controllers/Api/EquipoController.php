<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Http\Requests\StoreEquipoRequest;

class EquipoController extends Controller
{
    // Método para crear un nuevo equipo
    public function store(StoreEquipoRequest $request)
    {
        // Validar y crear el equipo con los datos del request
        $equipo = Equipo::create($request->validated());

        // Retornar el equipo creado con el código 201 (Creado)
        return response()->json($equipo, 201);
    }

    // Método para eliminar un equipo (soft delete)
    public function destroy($id)
    {
        // Buscar el equipo por su ID
        $equipo = Equipo::findOrFail($id);
        
        // Eliminar el equipo (soft delete)
        $equipo->delete();

        // Retornar mensaje de éxito
        return response()->json([
            'message' => 'Equipo eliminado correctamente (soft delete)'
        ]);
    }

    // Método para listar todos los equipos
    public function index()
    {
        // Obtener todos los equipos de la base de datos
        $equipos = Equipo::all();

        // Retornar los equipos como JSON
        return response()->json($equipos);
    }

    // Método para obtener el usuario que tiene asignado un equipo
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
