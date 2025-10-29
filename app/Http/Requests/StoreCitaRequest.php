<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApoderadoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return in_array(auth()->user()->rol, ['TOE', 'PSICOLOGO']);
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'parentesco' => 'required|string|in:Madre,Padre,Tutor Legal,Abuelo/a,Tío/a,Otro',
            'correo' => 'nullable|email|max:100|unique:apoderados,correo',
            'telefono' => 'nullable|string|max:15|regex:/^[0-9\s]+$/',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del apoderado es obligatorio.',
            'parentesco.required' => 'El parentesco es obligatorio.',
            'parentesco.in' => 'El parentesco seleccionado no es válido.',
            'correo.email' => 'El correo debe ser válido.',
            'correo.unique' => 'Este correo ya está registrado.',
            'telefono.regex' => 'El teléfono solo debe contener números.',
        ];
    }
}