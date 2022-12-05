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
        $rolSuperAdmin = Role::create(['name' => 'Super Administrador']);
        $rolAdmin = Role::create(['name' => 'Administrador']);
        $rolUsuario = Role::create(['name' => 'Usuario']);

        $listarUsuario = Permission::create(['name' => 'listar usuarios']);
        $editarUsuario = Permission::create(['name' => 'editar usuarios']);
        $crearUsario = Permission::create(['name' => 'crear usuarios']);
        $listarRoles = Permission::create(['name' => 'listar roles']);
        $editarRoles = Permission::create(['name' => 'editar roles']);

        //* permisos sueper admin
        $this->agregarPermisos($rolSuperAdmin, [
            $listarUsuario,
            $editarUsuario,
            $crearUsario,
            $listarRoles,
            $editarRoles,
        ]);

        //* permiso admin
        $this->agregarPermisos($rolAdmin, [
            $listarUsuario,
            $editarUsuario,
            $crearUsario,
            $listarRoles,
        ]);

        //* permisos usuario
        $this->agregarPermisos($rolUsuario, []);
    }

    /**
     * @param any rol rol al que que se desea agregar permisos
     * @param array lsitado de permisos a agregar
     */
    public function agregarPermisos($rol, array $listaPermisos): void
    {
        foreach ($listaPermisos as $permiso)
        {
            $rol->givePermissionTo($permiso);
        }
    }
}
