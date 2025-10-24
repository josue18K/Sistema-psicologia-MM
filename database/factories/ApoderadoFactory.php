<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApoderadoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'parentesco' => fake()->randomElement(['Padre', 'Madre', 'Tutor Legal', 'Abuelo/a', 'Tío/a']),
            'correo' => fake()->unique()->safeEmail(),
            'telefono' => fake()->numerify('9########'),
        ];
    }
}
