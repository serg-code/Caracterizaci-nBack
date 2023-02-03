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

        $rolSuperAdmin = Role::create(['name' => 'Super Administrador']);
        $rolAdmin = Role::create(['name' => 'Administrador']);
        $rolUsuario = Role::create(['name' => 'Usuario']);
        $rolEncuestador = Role::create(['name' => 'Encuestador']);


        /**
         * ------------------------------------------------------------------------
         *      Permisos Usuarios
         * ------------------------------------------------------------------------
         */

        $listarUsuario = Permission::create(['name' => 'listar usuarios', 'referencia' => 'usuarios.listar']);
        $editarUsuario = Permission::create(['name' => 'editar usuarios', 'referencia' => 'usuarios.editar']);
        $crearUsario = Permission::create(['name' => 'crear usuarios', 'referencia' => 'usuarios.crear']);
        $habilitarRoles = Permission::create(['name' => 'habilitar roles', 'referencia' => 'roles.habilitar']);
        $deshabilitarRoles = Permission::create(['name' => 'deshabilitar role', 'referencia' => 'roles.deshabilitar']);
        $listarReporte = Permission::create(['name' => 'listar reporte', 'referencia' => 'reporte.listar']);
        $editarReporte = Permission::create(['name' => 'editar reporte', 'referencia' => 'reporte.editar']);


        /**
         * ------------------------------------------------------------------------
         *      Permisos Modulo Roles
         * ------------------------------------------------------------------------
         */

        $listarRoles = Permission::create(['name' => 'listar roles', 'referencia' => 'roles.listar']);
        $editarRoles = Permission::create(['name' => 'editar roles', 'referencia' => 'roles.editar']);
        $crearRoles = Permission::create(['name' => 'crear roles', 'referencia' => 'roles.crear']);



        /**
         * ------------------------------------------------------------------------
         *      Permisos BarriosVeredas
         * ------------------------------------------------------------------------
         */

        $listarBarrioVereda = Permission::create(['name' => 'listar BarrioVereda', 'referencia' => 'BarrioVereda.listar']);
        $editarBarrioVereda = Permission::create(['name' => 'editar BarrioVereda', 'referencia' => 'BarrioVereda.editar']);
        $eliminarBarrioVereda = Permission::create(['name' => 'eliminar BarrioVereda', 'referencia' => 'BarrioVereda.eliminar']);



        /**
         * ------------------------------------------------------------------------
         *      Permisos Mapa
         * ------------------------------------------------------------------------
         */

        $verMapa = Permission::create(['name' => 'ver mapa', 'referencia' => 'mapa.ver']);



        /**
         * ------------------------------------------------------------------------
         *      Permisos Ecuestador
         * ------------------------------------------------------------------------
         */

        $listarHogar = Permission::create(['name' => 'listar hogar', 'referencia' => 'hogar.listar']);
        $crearHogar = Permission::create(['name' => 'crear hogar', 'referencia' => 'hogar.crear']);
        $eliminarHogar = Permission::create(['name' => 'eliminar hogar', 'referencia' => 'hogar.eliminar']);
        $crearIntegrante = Permission::create(['name' => 'crear integrante', 'referencia' => 'integrante.crear']);
        $listarIntegrante = Permission::create(['name' => 'listar integrante', 'referencia' => 'integrante.listar']);
        $eliminarIntegrante = Permission::create(['name' => 'eliminar integrante', 'referencia' => 'integrante.eliminar']);



        /**
         * ------------------------------------------------------------------------
         *      Asignar lista de permisos a los roles
         * ------------------------------------------------------------------------
         */
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
            $crearIntegrante,
            $listarIntegrante,
            $listarReporte,
            $editarReporte,
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
            $listarIntegrante,
            $listarReporte,
            $editarReporte,
        ]);

        //* permisos usuario
        $this->agregarPermisos($rolUsuario, []);

        //* permisos encuestador
        $this->agregarPermisos($rolEncuestador, [
            $listarHogar,
            $crearHogar,
            $eliminarHogar,
            $crearIntegrante,
            $listarIntegrante,
        ]);
    }

    /**
     * @param any rol rol al que que se desea agregar permisos
     * @param array lsitado de permisos a agregar
     */
    public function agregarPermisos(Role $rol, array $listaPermisos): void
    {
        foreach ($listaPermisos as $permiso)
        {
            $rol->givePermissionTo($permiso);
        }
    }
}
