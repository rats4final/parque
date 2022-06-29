<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
            'id_rol' => 1,
            'nombre_rol' => 'Admin',
            'descripcion_rol' => 'rol de administrador',
            ],
            [
            'id_rol' => 2,
            'nombre_rol' => 'Cliente',
            'descripcion_rol' => 'rol de cliente',
            ],
        ]);
    }
}
