<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoWebController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/equipos', [EquipoWebController::class, 'index']);
