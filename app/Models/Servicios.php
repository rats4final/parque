<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'id_servicio';
    protected $fillable = [
    // 'codigo',
    'nombre_servicio',
    'descripcion_servicio',
    'precio_servicio',
    'imagen_servicio',
    'id_categoria',
    ];

    public function categorias()//un servicio tiene solo 1 categoria
    {
        return $this->belongsTo(categoriaModelo::class,'id_categoria');
    }
    public function usuario_opera_servicio()//un servicio tiene solo 1 categoria
    {
        return $this->hasMany(usuario_opera_servicioModelo::class,'servicios_id_servicio');
    }
}


