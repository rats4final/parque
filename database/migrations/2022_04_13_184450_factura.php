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
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_cliente')->on('Clientes');
            $table->integer('id_lugar')->unsigned();
            $table->foreign('id_lugar')->references('id_lugar')->on('Lugares');
            $table->integer('id_ticket')->unsigned();
            $table->foreign('id_ticket')->references('id_ticket')->on('Tickets');

            $table->integer('id_atraccion')->unsigned();
            $table->foreign('id_atraccion')->references('id_atraccion')->on('Atracciones');

            $table->integer('id_souvenir')->unsigned();
            $table->foreign('id_souvenir')->references('id_souvenir')->on('Souvenirs');
            $table->date('fecha');

            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id_users')->on('users');




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
