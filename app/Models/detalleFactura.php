<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalleFactura extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_detalle';
    protected $table ='servicio_tiene_factura';
    protected $fillable = [
        'facturas_id_factura',
        'servicios_id_servicio',
        'cantidad',
        'precio_unitario',
        'descuento'
    ];

    // public function servicios(){
    //     return $this->belongsTo(Servicios::class,'id_servicio');
    // } // al parecer el belongsto si afecta, habra que investigar porque

    public function factura(){
        return $this->belongsTo(Factura::class,'id_factura');
    }
}
