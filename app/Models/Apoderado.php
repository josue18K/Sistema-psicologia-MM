<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'parentesco',
        'correo',
        'telefono',
    ];

    // Relación: Un apoderado puede tener muchos estudiantes
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'apoderado_id');
    }
}
