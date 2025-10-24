<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'edad',
        'grado',
        'seccion',
        'tutor_id',
        'apoderado_id',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    // Relación con Tutor (User)
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }

    // Relación con Apoderado
    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class, 'apoderado_id');
    }

    // Relación con Diagnósticos
    public function diagnosticos()
    {
        return $this->hasMany(Diagnostico::class, 'dni_estudiante', 'dni');
    }

    // Relación con Citas
    public function citas()
    {
        return $this->hasMany(Cita::class, 'dni_estudiante', 'dni');
    }

    // Accessor para nombre completo
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }
}