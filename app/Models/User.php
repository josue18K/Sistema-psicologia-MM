<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'estado',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'estado' => 'boolean',
        ];
    }

    // Relaciones
    public function diagnosticos()
    {
        return $this->hasMany(Diagnostico::class, 'psicologo_id');
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class, 'psicologo_id');
    }

    public function notificacionesEnviadas()
    {
        return $this->hasMany(Notificacion::class, 'remitente_id');
    }

    public function notificacionesRecibidas()
    {
        return $this->hasMany(Notificacion::class, 'destinatario_id');
    }
}
