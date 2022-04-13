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
        Schema::create('Factura', function (Blueprint $table) {
            $table->Increments('id_factura');
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_cliente')->on('Cliente');
            $table->integer('id_lugar')->unsigned();
            $table->foreign('id_lugar')->references('id_lugar')->on('Lugar');
            $table->integer('id_ticket')->unsigned();
            $table->foreign('id_ticket')->references('id_ticket')->on('Ticket');
            $table->integer('id_souvenir')->unsigned();
            $table->foreign('id_souvenir')->references('id_souvenir')->on('Souvenir');
            $table->date('Fecha');
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
        Schema::dropIfExists('Factura');

    }
}
