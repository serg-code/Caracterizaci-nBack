<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Dev\Usuario\Usuario;
use App\Dev\Validacion\RolValidacion;
use App\Models\Permisos\Roles;
use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario = $request->user();
        if (!Usuario::validaroRoles($usuario, ['Super Administrador', 'Administrador']))
        {
            return RespuestaHttp::respuesta(
                401,
                'unautorized',
                'algo ha salido mal'
            );
        }

        $roles = Roles::all();
        return RespuestaHttp::respuesta(
            200,
            'succes',
            'listado de roles',
            [
                $roles
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function otorgarRol(Request $request, $idUsuario)
    {
        $usuario = User::find($idUsuario);
        $controlUsuario = new Usuario($usuario, $request);
        $errores = RolValidacion::validar($request);

        if (!empty($errores) || !$controlUsuario->permitir())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'No puede realizar esta accion',
                $errores
            );
        }

        $controlUsuario->otorgarRol($request->input('rol'));
        return RespuestaHttp::respuesta(
            201,
            'created',
            'rol otorgado con exito',
            [
                "usuario" => $usuario,
            ]
        );
    }

    public function revocarRol(Request $request, $idUsuario)
    {
        $usuario = User::find($idUsuario);
        $controlUsuario = new Usuario($usuario, $request);
        $errores = RolValidacion::validar($request);

        if (!empty($errores) || !$controlUsuario->permitir())
        {

            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'No puede realizar esta accion',
                $errores
            );
        }

        $controlUsuario->revocarRol($request->input('rol'));
        return RespuestaHttp::respuesta(
            200,
            'succes',
            'rol removido exitosamente',
            [
                'usuario' => $usuario,
            ]
        );
    }
}
