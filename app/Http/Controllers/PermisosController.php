<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Dev\Usuario\Usuario;
use App\Dev\Validacion\PermisoValidacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{

    public function index()
    {
        $permisos = Permission::all();

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Listado de permisos',
            [
                'permisos' => $permisos,
            ]
        );
    }

    public function store(Request $request)
    {
        $validacion = Validator::make(
            $request->all(),
            [
                'permiso' => 'required',
            ],
            [
                'permiso.required' => 'El permiso es necesario',
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Se encontraron errores en la validacion',
                $validacion->getMessageBag()
            );
        }

        $permisoCrear = $request->input('permiso');
        $permiso = new Permission(['name' => $permisoCrear, 'guard_name' => 'web']);
        $permiso->save();

        return RespuestaHttp::respuesta(
            201,
            'Created',
            'Permiso creado creado exitosamente',
            [
                'permiso' => $permiso,
            ]
        );
    }

    public function show(Request $request, $idPermiso)
    {
        $permiso = Permission::find($idPermiso);

        if (empty($permiso))
        {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No encontramos el Permiso',
                [
                    'permiso' => ['No encontramos el permiso']
                ]
            );
        }

        return RespuestaHttp::respuesta(
            200,
            'Succes',
            'Permiso',
            [
                'permiso' => $permiso
            ]
        );
    }

    public function update(Request $request, $idPermiso)
    {
        $permiso = Permission::find($idPermiso);

        if (empty($permiso))
        {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No encontramos el Permiso',
                [
                    'permiso' => ['No encontramos el permiso']
                ]
            );
        }

        $validacion = Validator::make(
            $request->all(),
            [
                'permiso' => 'required',
            ],
            [
                'permiso.required' => 'El permiso es necesario',
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Errores en la validacion',
                $validacion->getMessageBag()
            );
        }

        $permiso->name = $request->input('permiso');
        $permiso->save();

        return RespuestaHttp::respuesta(
            200,
            'Succes',
            'Permiso',
            [
                'permiso' => $permiso
            ]
        );
    }

    public function destroy(Request $request, $idPermiso)
    {
        # code...
    }

    public function otorgarPermisos(Request $request)
    {

        $validacion = Validator::make(
            $request->all(),
            [
                'id_usuario' => 'required|exists:users,id',
                'id_permiso' => 'required|exists:permissions,id'
            ],
            [
                'id_usuario.required' => 'El id del usuario es necesario',
                'id_usuario.exists' => 'El usuario buscado no existe',
                'id_permiso.required' => 'El id del permiso es necesario',
                'id_permiso.exists' => 'El permiso no existe',
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Errores en la informacion',
                $validacion->getMessageBag()
            );
        }

        $idUsuario = $request->input('id_usuario');
        $idPermiso = $request->input('id_permiso');
        $usuario = User::find($idUsuario);
        $permiso = Permission::find($idPermiso);
        $usuario->hasPermissionTo($permiso->name);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Permiso otorgado',
            [
                'usuario' => $usuario,
            ]
        );
    }
}
