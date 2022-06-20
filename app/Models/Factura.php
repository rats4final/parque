<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'facturas';
    protected $primaryKey = 'id_factura';
    protected $fillable = [
        'user',
        'fecha_emision',
        'total',
        'cliente',
        'fecha_maxima_emision',
        'ci_cliente',
        'autorizacion',
        'codigo_control'
    ];

    public function detalleFacturas(){ //maldita s
        return $this->hasMany(detalleFactura::class,'facturas_id_factura','id_factura');
    }
} //con hasMany en cambio primero es la llave en la tabla foranea y despues la que esta en nuestra tabla actua
