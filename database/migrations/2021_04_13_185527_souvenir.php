<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Souvenir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Souvenirs', function (Blueprint $table) {
            $table->Increments('id_souvenir');
            $table->string('Nombre_souv');
            $table->string('Descripcion_souv');
            $table->Integer('Precio_souv');
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
        Schema::dropIfExists('Souvenirs');
    }
}
