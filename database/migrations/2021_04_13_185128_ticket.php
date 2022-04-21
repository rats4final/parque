<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ticket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Tickets', function (Blueprint $table) {
            $table->Increments('id_ticket');
            $table->string('Codigo');
            $table->date('Fecha');
            $table->Integer('precio');
            $table->date('Expiracion');
            $table->Integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')->references('id_tipo')->on('Tipos_tickets');
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
        Schema::dropIfExists('Tickets');
    }
}
