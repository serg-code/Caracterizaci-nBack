<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User(['name' => 'Super Administrador', 'email' => 'mail@mail.com', 'password' => '123asd']);
        $usuario->save();
        $usuario->assignRole('Super Administrador');
    }
}
