<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Cliente', function (Blueprint $table) {
            $table->Increments('id_cliente');
            $table->string('Nombre_cli');
            $table->string('Apellido_cli');
            $table->string('Ci');
            $table->string('Celular');
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

        Schema::dropIfExists('Cliente');
    }
}
