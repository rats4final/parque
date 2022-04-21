<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserControlaAtracion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Usuario_controla_atraciones', function (Blueprint $table) {
            $table->Increments('id_usuario_controla_atracion');
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id_users')->on('users');
            $table->integer('id_atraccion')->unsigned();
            $table->foreign('id_atraccion')->references('id_atraccion')->on('Atracciones');

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
        Schema::dropIfExists('Usuario_controla_atraciones');
    }
}
