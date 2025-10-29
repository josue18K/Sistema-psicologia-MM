<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->string('dni', 8)->primary();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->string('grado', 20);
            $table->string('seccion', 10);
            $table->foreignId('tutor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('apoderado_id')->nullable()->constrained('apoderados')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
