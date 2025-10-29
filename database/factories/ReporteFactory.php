<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReporteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'psicologo_id' => User::where('rol', 'PSICOLOGO')->inRandomOrder()->first()?->id,
            'mes' => fake()->monthName() . ' ' . fake()->year(),
            'total_estudiantes' => fake()->numberBetween(10, 50),
            'casos_criticos' => fake()->numberBetween(0, 10),
            'observaciones' => fake()->paragraph(2),
        ];
    }
}