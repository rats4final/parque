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

    public function servicio(){
        return $this->belongsTo(Servicios::class,'servicios_id_servicio','id_servicio');
    } //XD
    //NOTA IMPORTANTE, cuando usas belongsTo, debes referenciar a la misma columna dentro de la tabla relacional
    //la cual viene de forma foranea de su tabla original
    public function factura(){
        return $this->belongsTo(Factura::class,'facturas_id_factura','id_factura');
    }

}
