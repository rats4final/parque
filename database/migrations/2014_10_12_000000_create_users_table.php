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
            $table->string('apellido')->nullable();
            $table->date('fecha_nac_user')->nullable();
            $table->string('img_user')->nullable();
            $table->string('celular')->nullable();
            $table->integer('ci')->nullable(); //como que integer hijo de perra
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
            $table->integer('id_rol')->unsigned()->nullable();
            $table->foreign('id_rol')->references('id_rol')->on('Roles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
