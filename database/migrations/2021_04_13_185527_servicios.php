<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Servicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Servicios', function (Blueprint $table) {
            $table->Increments('id_servicio');
            // $table->integer('codigo');
            $table->string('nombre_servicio');
            $table->string('descripcion_servicio')->nullable();
            $table->double('precio_servicio');
            $table->string('imagen_servicio')->nullable();
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id_categoria')->on('Categorias');
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
        Schema::dropIfExists('Servicios');
    }
}
