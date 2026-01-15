<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permitir que cualquier usuario realice esta solicitud
    }

    public function rules(): array
    {
        return [
            'marca' => 'required|string|max:100',
            'nombre' => 'required|string|max:100',
            'numero_serie' => [
                'required',
                'regex:/^SENA-\d{4}$/',
                'unique:equipos,numero_serie'
            ],
            'categoria' => 'required|string|max:100',
            'estado' => 'required|in:en uso,libre,reparacion,dado_de_baja'
        ];
    }
}
