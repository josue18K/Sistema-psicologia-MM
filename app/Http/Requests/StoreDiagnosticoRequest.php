<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosticoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->rol === 'PSICOLOGO';
    }

    public function rules(): array
    {
        return [
            'dni_estudiante' => 'required|string|size:8|exists:estudiantes,dni',
            'psicologo_id' => 'required|exists:users,id',
            'fecha' => 'required|date|before_or_equal:today',
            'tipo' => 'required|string|max:100',
            'observaciones' => 'nullable|string|max:2000',
            'recomendaciones' => 'nullable|string|max:2000',
            'nivel_riesgo' => 'required|in:BAJO,MEDIO,ALTO',
        ];
    }

    public function messages(): array
    {
        return [
            'dni_estudiante.required' => 'Debe seleccionar un estudiante.',
            'dni_estudiante.exists' => 'El estudiante seleccionado no existe.',
            'psicologo_id.required' => 'El psicólogo es obligatorio.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.before_or_equal' => 'La fecha no puede ser futura.',
            'tipo.required' => 'El tipo de problema es obligatorio.',
            'nivel_riesgo.required' => 'El nivel de riesgo es obligatorio.',
            'nivel_riesgo.in' => 'El nivel de riesgo debe ser BAJO, MEDIO o ALTO.',
        ];
    }
}
