<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //crear roles y permisos
        $rol = Role::create(['name' => 'Super Administrator']);
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Usuario']);


        Permission::create(['name' => 'listar usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'listar roles']);
        Permission::create(['name' => 'editar roles']);
    }
}
