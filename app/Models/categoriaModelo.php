<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriaModelo extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $fillable = ['nombre_categoria','descripcion_categoria'];

    public function servicios()//una categoria tiene muchos servicios
    {
        return $this->hasMany(Servicios::class,'id_categoria','id_categoria');
    }
}
