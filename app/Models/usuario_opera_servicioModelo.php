<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_opera_servicioModelo extends Model
{
    use HasFactory;
 
    protected $table = 'usuario_opera_servicio';
    protected $fillable = [
    'servicios_id_servicio',
    'users_id_user',
    'turno_inicio',
    'turno_fin',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'users_id_user');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicios::class,'servicios_id_servicio');
    }
}
