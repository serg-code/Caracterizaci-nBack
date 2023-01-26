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

        /**
         * ------------------------------------------------------------------------
         *      Crear Roles
         * ------------------------------------------------------------------------
         */

        //crear roles y permisos
        $rolSuperAdmin = Role::create(['name' => 'Super Administrador']);
        $rolAdmin = Role::create(['name' => 'Administrador']);
        $rolUsuario = Role::create(['name' => 'Usuario']);
        $rolEncuestador = Role::create(['name' => 'Encuestador']);


        /**
         * ------------------------------------------------------------------------
         *      Permisos Usuarios
         * ------------------------------------------------------------------------
         */

        //* Usuarios
        $listarUsuario = Permission::create(['name' => 'listar usuarios']);
        $editarUsuario = Permission::create(['name' => 'editar usuarios']);
        $crearUsario = Permission::create(['name' => 'crear usuarios']);
        $habilitarRoles = Permission::create(['name' => 'habilitar usuarios']);
        $deshabilitarRoles = Permission::create(['name' => 'deshabilitar usuarios']);



        /**
         * ------------------------------------------------------------------------
         *      Permisos Modulo Roles
         * ------------------------------------------------------------------------
         */

        //* roles
        $listarRoles = Permission::create(['name' => 'listar roles']);
        $editarRoles = Permission::create(['name' => 'editar roles']);
        $crearRoles = Permission::create(['name' => 'crear roles']);



        /**
         * ------------------------------------------------------------------------
         *      Permisos BarriosVeredas
         * ------------------------------------------------------------------------
         */

        //* BarriosVeredas
        $listarBarrioVereda = Permission::create(['name' => 'listar BarrioVereda']);
        $editarBarrioVereda = Permission::create(['name' => 'editar BarrioVereda']);
        $eliminarBarrioVereda = Permission::create(['name' => 'eliminar BarrioVereda']);



        /**
         * ------------------------------------------------------------------------
         *      Permisos Mapa
         * ------------------------------------------------------------------------
         */
        $verMapa = Permission::create(['name' => 'ver mapa']);



        /**
         * ------------------------------------------------------------------------
         *      Permisos Ecuestador
         * ------------------------------------------------------------------------
         */
        $listarHogar = Permission::create(['name' => 'listar hogar']);
        $crearHogar = Permission::create(['name' => 'crear hogar']);
        $eliminarHogar = Permission::create(['name' => 'eliminar hogar']);
        /**
         * ------------------------------------------------------------------------
         *      Asignar lista de permisos a los roles
         * ------------------------------------------------------------------------
         */


        //* permisos sueper admin
        $this->agregarPermisos($rolSuperAdmin, [
            $listarUsuario,
            $editarUsuario,
            $crearUsario,
            $listarRoles,
            $editarRoles,
            $crearRoles,
            $listarBarrioVereda,
            $editarBarrioVereda,
            $eliminarBarrioVereda,
            $verMapa,
            $listarHogar,
            $crearHogar,
            $eliminarHogar,
            $habilitarRoles,
            $deshabilitarRoles,
        ]);

        //* permiso admin
        $this->agregarPermisos($rolAdmin, [
            $listarUsuario,
            $editarUsuario,
            $crearUsario,
            $listarRoles,
            $listarBarrioVereda,
            $editarBarrioVereda,
            $eliminarBarrioVereda,
            $verMapa,
            $habilitarRoles,
            $deshabilitarRoles,
        ]);

        //* permisos usuario
        $this->agregarPermisos($rolUsuario, []);

        //* permisos encuestador
        $this->agregarPermisos($rolEncuestador, [
            $listarHogar,
            $crearHogar,
            $eliminarHogar,
        ]);
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
