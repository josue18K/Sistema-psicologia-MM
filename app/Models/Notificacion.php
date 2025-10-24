<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    protected $fillable = [
        'remitente_id',
        'destinatario_id',
        'mensaje',
        'fecha_envio',
        'leida',
    ];

    protected $casts = [
        'fecha_envio' => 'datetime',
        'leida' => 'boolean',
    ];

    // Relación con Remitente (User)
    public function remitente()
    {
        return $this->belongsTo(User::class, 'remitente_id');
    }

    // Relación con Destinatario (User)
    public function destinatario()
    {
        return $this->belongsTo(User::class, 'destinatario_id');
    }
}
