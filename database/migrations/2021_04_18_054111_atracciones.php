<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Atracciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Atracciones', function (Blueprint $table) {
            $table->Increments('id_atraccion');
            $table->string('nombre_atraccion');
            $table->string('descripcion_atraccion');
            $table->integer('capacidad_atraccion');
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
