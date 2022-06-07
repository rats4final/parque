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
        Schema::create('Usuario_opera_servicio', function (Blueprint $table) {
            $table->integer('servicios_id_servicio')->unsigned();
            $table->foreign('servicios_id_servicio')->references('id_servicio')->on('Servicios');
            $table->integer('users_id_user')->unsigned();
            $table->foreign('users_id_user')->references('id_users')->on('users');
            $table->time('turno_inicio')->nullable();
            $table->time('turno_fin')->nullable();
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
