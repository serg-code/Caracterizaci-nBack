<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:listar roles', ['only' => ['show', 'index']]);
        $this->middleware('permission:crear roles', ['only' => ['store']]);
        $this->middleware('permission:editar roles', ['only' => ['update']]);
        $this->middleware(
            ['permission:habilitar roles', 'permission:deshabilitar role'],
            ['only' => ['controlPermisos', 'revocarPermisos']]
        );
    }
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
        $respuesta = $this->controlPermisos($request->all());
        return RespuestaHttp::respuestaObjeto($respuesta);
    }

    public function revocarPermisos(Request $request)
    {
        $respuesta = $this->controlPermisos($request->all(), true);
        return RespuestaHttp::respuestaObjeto($respuesta);
    }

    protected function controlPermisos(array $datosValidar, bool $revocar = false): RespuestaHttp
    {
        $validacion = Validator::make(
            $datosValidar,
            [
                'id_usuario' => 'required|exists:users,id',
                'permisos' => 'required|array'
            ],
            [
                'id_usuario.required' => 'El id del usuario es necesario',
                'id_usuario.exists' => 'El usuario buscado no existe',
                'permisos' => 'El listado de permisos es necesario',
                'permisos.array' => 'Los permisos no son un arreglo',
            ]
        );

        if ($validacion->fails())
        {
            return new RespuestaHttp(
                400,
                'Bad request',
                'Errores en la informacion',
                $validacion->getMessageBag()
            );
        }

        $listadoPermisos = $this->obtenerNombrePermisos($datosValidar['permisos']);
        $idUsuario = $datosValidar['id_usuario'];
        $usuario = User::find($idUsuario);

        if ($revocar)
        {
            $usuario->revokePermissionTo($listadoPermisos);
            return new RespuestaHttp(
                200,
                'succes',
                'Permiso revocado',
                [
                    'usuario' => $usuario,
                ]
            );
        }

        $usuario->givePermissionTo($listadoPermisos);
        return new RespuestaHttp(
            200,
            'succes',
            'Permiso otorgado',
            [
                'usuario' => $usuario,
            ]
        );
    }

    protected function obtenerNombrePermisos(array $listadoIds): array
    {
        return array_map(function ($idPermiso)
        {
            $permiso = Permission::find($idPermiso);

            return $permiso->name ?? null;
        }, $listadoIds);
    }
}
