<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lugar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('Lugares', function (Blueprint $table) {
            $table->Increments('id_lugar');
            $table->string('Nombre_lugar');
            $table->string('Descrpcion_lugar');
            $table->string('Disponible');
            $table->Integer('Precio');

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
        Schema::dropIfExists('Lugares');
    }
}
