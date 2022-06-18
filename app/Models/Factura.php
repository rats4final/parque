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

    public function detalleFactura(){
        return $this->hasMany(detalleFactura::class,'facturas_id_factura');
    }
}
