<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Apoderado;
use App\Models\Estudiante;
use App\Models\Diagnostico;
use App\Models\Cita;
use App\Models\Reporte;
use App\Models\Notificacion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear usuarios por rol
        $toe = User::factory()->toe()->create([
            'name' => 'Juan Pérez',
            'email' => 'toe@colegio.com',
            'password' => bcrypt('password123'),
        ]);

        $psicologo = User::factory()->psicologo()->create([
            'name' => 'María García',
            'email' => 'psicologo@colegio.com',
            'password' => bcrypt('password123'),
        ]);

        $director = User::factory()->director()->create([
            'name' => 'Carlos Rodríguez',
            'email' => 'director@colegio.com',
            'password' => bcrypt('password123'),
        ]);

        // Crear 5 tutores
        $tutores = User::factory()->tutor()->count(5)->create();

        // Crear más psicólogos y tutores aleatorios
        User::factory()->psicologo()->count(2)->create();
        User::factory()->tutor()->count(5)->create();

        // 2. Crear apoderados y estudiantes
        Estudiante::factory()->count(50)->create();

        // 3. Crear diagnósticos
        Diagnostico::factory()->count(30)->create();

        // 4. Crear citas
        Cita::factory()->count(40)->create();

        // 5. Crear reportes
        Reporte::factory()->count(10)->create();

        // 6. Crear notificaciones
        Notificacion::factory()->count(20)->create();

        $this->command->info('✅ Base de datos poblada exitosamente!');
        $this->command->info('📧 Usuarios de prueba:');
        $this->command->info('   TOE: toe@colegio.com');
        $this->command->info('   Psicólogo: psicologo@colegio.com');
        $this->command->info('   Director: director@colegio.com');
        $this->command->info('   Contraseña para todos: password123');
    }
}
