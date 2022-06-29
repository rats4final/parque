<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;//importar el facade xd

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'Juan',
            'apellido' => 'Bonaparte',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin2022'),
            'id_rol' => 1
            ]
        ]);
    }
}
