<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtraccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Atracciones', function (Blueprint $table) {
            $table->increments('id_atraccion');
            $table->string('nombre_atraccion');
            $table->string('descripcion_atraccion');
            $table->int('capacidad_atraccion');
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
        Schema::dropIfExists('Atracciones');
    }
}
