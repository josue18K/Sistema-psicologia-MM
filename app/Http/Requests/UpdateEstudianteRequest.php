<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEstudianteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return in_array(auth()->user()->rol, ['TOE', 'PSICOLOGO']);
    }

    public function rules(): array
    {
        // Obtener el DNI del estudiante que se está actualizando
        $dni = $this->route('estudiante');

        return [
            'nombres' => 'sometimes|string|max:100|regex:/^[\pL\s]+$/u',
            'apellidos' => 'sometimes|string|max:100|regex:/^[\pL\s]+$/u',
            'fecha_nacimiento' => 'sometimes|date|before:today',
            'edad' => 'sometimes|integer|min:3|max:20',
            'grado' => 'sometimes|string|in:1ro,2do,3ro,4to,5to,6to',
            'seccion' => 'sometimes|string|in:A,B,C,D',
            'tutor_id' => 'nullable|exists:users,id',
            'apoderado_id' => 'nullable|exists:apoderados,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nombres.regex' => 'Los nombres solo deben contener letras.',
            'apellidos.regex' => 'Los apellidos solo deben contener letras.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'edad.min' => 'La edad mínima es 3 años.',
            'edad.max' => 'La edad máxima es 20 años.',
            'grado.in' => 'El grado seleccionado no es válido.',
            'seccion.in' => 'La sección seleccionada no es válida.',
        ];
    }
}
