<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni_estudiante',
        'psicologo_id',
        'fecha',
        'tipo',
        'observaciones',
        'recomendaciones',
        'nivel_riesgo',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    // Relación con Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'dni_estudiante', 'dni');
    }

    // Relación con Psicólogo (User)
    public function psicologo()
    {
        return $this->belongsTo(User::class, 'psicologo_id');
    }
}
