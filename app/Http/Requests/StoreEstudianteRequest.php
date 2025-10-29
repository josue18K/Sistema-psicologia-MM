<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstudianteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return in_array(auth()->user()->rol, ['TOE', 'PSICOLOGO']);
    }

    public function rules(): array
    {
        return [
            'dni' => 'required|string|size:8|unique:estudiantes,dni|regex:/^[0-9]+$/',
            'nombres' => 'required|string|max:100|regex:/^[\pL\s]+$/u',
            'apellidos' => 'required|string|max:100|regex:/^[\pL\s]+$/u',
            'fecha_nacimiento' => 'required|date|before:today',
            'edad' => 'required|integer|min:3|max:20',
            'grado' => 'required|string|in:1ro,2do,3ro,4to,5to,6to',
            'seccion' => 'required|string|in:A,B,C,D',
            'tutor_id' => 'nullable|exists:users,id',
            'apoderado_id' => 'nullable|exists:apoderados,id',
            'crear_apoderado' => 'nullable|boolean',
            'apoderado_nombre' => 'required_if:crear_apoderado,true|string|max:100',
            'apoderado_parentesco' => 'required_if:crear_apoderado,true|string|in:Madre,Padre,Tutor Legal,Abuelo/a,Tío/a,Otro',
            'apoderado_correo' => 'nullable|email|max:100',
            'apoderado_telefono' => 'required_if:crear_apoderado,true|string|max:15|regex:/^[0-9\s]+$/',
        ];
    }

    public function messages(): array
    {
        return [
            'dni.required' => 'El DNI es obligatorio.',
            'dni.size' => 'El DNI debe tener exactamente 8 dígitos.',
            'dni.unique' => 'Este DNI ya está registrado.',
            'dni.regex' => 'El DNI solo debe contener números.',
            'nombres.required' => 'Los nombres son obligatorios.',
            'nombres.regex' => 'Los nombres solo deben contener letras.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.regex' => 'Los apellidos solo deben contener letras.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.min' => 'La edad mínima es 3 años.',
            'edad.max' => 'La edad máxima es 20 años.',
            'grado.required' => 'El grado es obligatorio.',
            'grado.in' => 'El grado seleccionado no es válido.',
            'seccion.required' => 'La sección es obligatoria.',
            'seccion.in' => 'La sección seleccionada no es válida.',
            'apoderado_nombre.required_if' => 'El nombre del apoderado es obligatorio.',
            'apoderado_parentesco.required_if' => 'El parentesco es obligatorio.',
            'apoderado_parentesco.in' => 'El parentesco seleccionado no es válido.',
            'apoderado_telefono.required_if' => 'El teléfono del apoderado es obligatorio.',
            'apoderado_telefono.regex' => 'El teléfono solo debe contener números.',
        ];
    }
}
