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

        return response()->json($equipos);
    }
}

  