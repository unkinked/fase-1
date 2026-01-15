<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    // Método para crear un préstamo
    public function store(Request $request)
    {
        // Validar que se haya pasado el id del equipo
        $request->validate([
            'equipo_id' => 'required|exists:equipos,id',  // El ID del equipo debe existir
            'user_id' => 'required|exists:users,id',     // El ID del usuario debe existir
            'fecha_prestamo' => 'required|date',         // La fecha del préstamo debe ser válida
            'estado' => 'required|string',               // El estado del préstamo (activo o finalizado)
        ]);

        // Buscar el equipo por su ID
        $equipo = Equipo::find($request->equipo_id);

        // Si el equipo no existe, devolver un error
        if (!$equipo) {
            return response()->json([
                'message' => 'Equipo no encontrado.'
            ], 404);
        }

        // Verificar si el equipo está disponible para préstamo
        if ($equipo->estado !== 'libre') {
            return response()->json([
                'message' => 'El equipo no está disponible para préstamo. Estado actual: ' . $equipo->estado
            ], 400);
        }

        // Crear el préstamo
        $prestamo = Prestamo::create([
            'user_id' => $request->user_id,
            'equipo_id' => $equipo->id,
            'fecha_prestamo' => $request->fecha_prestamo,
            'estado' => $request->estado,
        ]);

        // Cambiar el estado del equipo a 'en uso'
        $equipo->estado = 'en uso';
        $equipo->save();

        // Responder con el préstamo creado y un mensaje de éxito
        return response()->json([
            'message' => 'Préstamo creado correctamente.',
            'prestamo' => $prestamo
        ], 201); 
    }

    // Método para obtener el préstamo de un equipo
    public function show($id)
    {
        // Buscar el préstamo relacionado con el equipo
        $prestamo = Prestamo::with('equipo', 'user')->where('equipo_id', $id)->first();

        if (!$prestamo) {
            return response()->json([
                'message' => 'No se encontró un préstamo para el equipo.'
            ], 404);
        }

        return response()->json([
            'prestamo' => $prestamo
        ]);
    }
}
