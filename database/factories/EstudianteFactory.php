<?php

namespace Database\Factories;

use App\Models\Apoderado;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    public function definition(): array
    {
        $fechaNacimiento = fake()->dateTimeBetween('-18 years', '-5 years');
        $edad = now()->diffInYears($fechaNacimiento);

        return [
            'dni' => fake()->unique()->numerify('########'),
            'nombres' => fake()->firstName(),
            'apellidos' => fake()->lastName() . ' ' . fake()->lastName(),
            'fecha_nacimiento' => $fechaNacimiento,
            'edad' => $edad,
            'grado' => fake()->randomElement(['1ro', '2do', '3ro', '4to', '5to', '6to']),
            'seccion' => fake()->randomElement(['A', 'B', 'C', 'D']),
            'tutor_id' => User::where('rol', 'TUTOR')->inRandomOrder()->first()?->id,
            'apoderado_id' => Apoderado::factory(),
        ];
    }
}
