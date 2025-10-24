<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->string('dni_estudiante', 8);
            $table->foreignId('psicologo_id')->constrained('users')->onDelete('cascade');
            $table->date('fecha');
            $table->string('tipo', 100);
            $table->text('observaciones')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->enum('nivel_riesgo', ['BAJO', 'MEDIO', 'ALTO']);
            $table->timestamps();

            $table->foreign('dni_estudiante')->references('dni')->on('estudiantes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnosticos');
    }
};
