<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCitaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->rol === 'PSICOLOGO';
    }

    public function rules(): array
    {
        return [
            'dni_estudiante' => 'required|string|exists:estudiantes,dni',
            'fecha_cita' => 'required|date|after:now',
            'motivo' => 'required|string|max:500',
            'estado' => 'sometimes|in:PENDIENTE,REALIZADA,CANCELADA',
        ];
    }

    public function messages(): array
    {
        return [
            'dni_estudiante.required' => 'Debe seleccionar un estudiante.',
            'dni_estudiante.exists' => 'El estudiante seleccionado no existe.',
            'fecha_cita.required' => 'La fecha de la cita es obligatoria.',
            'fecha_cita.after' => 'La fecha de la cita debe ser futura.',
            'motivo.required' => 'El motivo de la cita es obligatorio.',
        ];
    }
}