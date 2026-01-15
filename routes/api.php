<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EquipoController;

Route::get('/ping', function () {
    return response()->json(['pong' => true]);
});

Route::post('/equipos', [EquipoController::class, 'store']);
Route::delete('/equipos/{id}', [EquipoController::class, 'destroy']);
Route::get('/equipos', [EquipoController::class, 'index']);
