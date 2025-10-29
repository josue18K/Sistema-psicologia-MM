<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determinar si el usuario está autorizado para hacer esta petición.
     */
    public function authorize(): bool
    {
        return auth()->user()->rol === 'TOE';
    }

    /**
     * Reglas de validación
     */
    public function rules(): array
    {
        // Obtener el ID del usuario desde la ruta
        $userId = $this->route('user');

        return [
            'name' => 'sometimes|string|max:100|regex:/^[\pL\s]+$/u',
            'email' => [
                'sometimes',
                'email',
                'max:100',
                Rule::unique('users', 'email')->ignore($userId)
            ],
            'password' => 'sometimes|string|min:6',
            'rol' => 'sometimes|in:TOE,PSICOLOGO,TUTOR,DIRECTOR',
            'estado' => 'sometimes|boolean',
        ];
    }

    /**
     * Mensajes de error personalizados
     */
    public function messages(): array
    {
        return [
            'name.max' => 'El nombre no puede exceder 100 caracteres.',
            'name.regex' => 'El nombre solo debe contener letras y espacios.',

            'email.email' => 'El correo electrónico debe ser válido.',
            'email.max' => 'El correo no puede exceder 100 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',

            'rol.in' => 'El rol seleccionado no es válido. Debe ser: TOE, PSICOLOGO, TUTOR o DIRECTOR.',

            'estado.boolean' => 'El estado debe ser verdadero o falso.',
        ];
    }

    /**
     * Atributos personalizados
     */
    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
            'rol' => 'rol',
            'estado' => 'estado',
        ];
    }
}
