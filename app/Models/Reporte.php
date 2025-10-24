<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'psicologo_id',
        'mes',
        'total_estudiantes',
        'casos_criticos',
        'observaciones',
    ];

    // Relación con Psicólogo (User)
    public function psicologo()
    {
        return $this->belongsTo(User::class, 'psicologo_id');
    }
}
