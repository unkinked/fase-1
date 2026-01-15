<?php

use App\Models\Prestamo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoWebController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/equipos', [EquipoWebController::class, 'listar']);
Route::get('/prestamos/crear', function () {return view('prestamos.create');
});
Route::get('/dashboard', [DashboardController::class, 'index']);