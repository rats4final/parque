<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServicioTieneFactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Servicio_tiene_factura', function (Blueprint $table) {
            $table->integer('servicios_id_servicio')->unsigned();
            $table->foreign('servicio_id_servicio')->references('id_servicio')->on('Servicios');
            $table->integer('facturas_id_factura')->unsigned();
            $table->foreign('facturas_id_factura')->references('id_factura')->on('Facturas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('Usuario_opera_servicio');
    }
}