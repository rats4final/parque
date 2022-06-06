<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id_users');
            $table->string('name');
            $table->string('apellido');
            $table->date('fecha_nac_user');
            $table->string('img_user')->nullable();
            $table->string('celular');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();//pinche david puto
            $table->integer('id_rol')->unsigned();
            $table->foreign('id_rol')->references('id_rol')->on('Roles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
