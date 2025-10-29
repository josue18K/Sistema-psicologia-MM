<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCitaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->rol === 'PSICOLOGO';
    }

    public function rules(): array
    {
        return [
            'fecha_cita' => 'sometimes|date',
            'motivo' => 'sometimes|string|max:500',
            'estado' => 'sometimes|in:PENDIENTE,REALIZADA,CANCELADA',
            'correo_enviado' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'motivo.max' => 'El motivo no puede exceder 500 caracteres.',
            'estado.in' => 'El estado debe ser PENDIENTE, REALIZADA o CANCELADA.',
        ];
    }
}