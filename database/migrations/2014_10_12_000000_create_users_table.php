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
<<<<<<< HEAD
            $table->string('Celular');
=======
            $table->string('img_user')->nullable();
            $table->string('celular');
>>>>>>> 150827e699ac01cd2bfa6b7f904a0b6e9b2b64f6
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
