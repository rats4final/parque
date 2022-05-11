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
            $table->dateTime('fecha_factura');
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
