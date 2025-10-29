<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('dni_estudiante', 8);
            $table->dateTime('fecha_cita');
            $table->text('motivo');
            $table->enum('estado', ['PENDIENTE', 'REALIZADA', 'CANCELADA'])->default('PENDIENTE');
            $table->boolean('correo_enviado')->default(false);
            $table->timestamps();

            $table->foreign('dni_estudiante')->references('dni')->on('estudiantes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
