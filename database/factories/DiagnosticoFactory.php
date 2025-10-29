<?php

namespace Database\Factories;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiagnosticoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'dni_estudiante' => Estudiante::inRandomOrder()->first()?->dni ?? Estudiante::factory(),
            'psicologo_id' => User::where('rol', 'PSICOLOGO')->inRandomOrder()->first()?->id,
            'fecha' => fake()->dateTimeBetween('-6 months', 'now'),
            'tipo' => fake()->randomElement([
                'Ansiedad',
                'Depresión',
                'Problemas de conducta',
                'Bajo rendimiento académico',
                'Dificultades de aprendizaje',
                'Problemas familiares',
                'Acoso escolar'
            ]),
            'observaciones' => fake()->paragraph(3),
            'recomendaciones' => fake()->paragraph(2),
            'nivel_riesgo' => fake()->randomElement(['BAJO', 'MEDIO', 'ALTO']),
        ];
    }
}