<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EquipoController;
use App\Http\Controllers\Api\PrestamoController;

Route::get('/ping', function () {
    return response()->json(['pong' => true]);
});

Route::get('/equipos', [EquipoController::class, 'index']); 
Route::post('/equipos', [EquipoController::class, 'store']); 
Route::delete('/equipos/{id}', [EquipoController::class, 'destroy']);
Route::get('/equipos/{id}/usuario', [EquipoController::class, 'usuario']);
Route::post('/prestamos', [PrestamoController::class, 'store']);
