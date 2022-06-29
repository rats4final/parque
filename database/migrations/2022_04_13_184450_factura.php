<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Facturas', function (Blueprint $table) {
            $table->Increments('id_factura');
            $table->date('fecha_emision');
            $table->string('user')->nullable();
            $table->integer('total');
            $table->string('cliente')->nullable();
            $table->date('fecha_maxima_emision');
            $table->string('ci_cliente')->nullable();
            $table->string('autorizacion');
            $table->string('codigo_control');
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
        Schema::dropIfExists('Facturas');

    }
}
