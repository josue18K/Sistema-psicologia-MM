<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificacionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'remitente_id' => User::inRandomOrder()->first()?->id,
            'destinatario_id' => User::inRandomOrder()->first()?->id,
            'mensaje' => fake()->sentence(15),
            'fecha_envio' => fake()->dateTimeBetween('-1 month', 'now'),
            'leida' => fake()->boolean(60), // 60% leídas
        ];
    }
}
