<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Dev\Usuario\Usuario;
use App\Dev\Validacion\RolValidacion;
use App\Models\Permisos\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

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
        $validacion = Validator::make(
            $request->all(),
            [
                'rol' => 'required',
            ],
            [
                'rol.required' => 'El rol es necesario'
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Error en la informacion',
                $validacion->getMessageBag()
            );
        }

        $rol = new Role([
            'name' => $request->input('rol'),
            'guard_name' => 'web',
        ]);
        $rol->save();

        return RespuestaHttp::respuesta(
            201,
            'Created',
            'Rol creado exitosamente',
            [
                'rol' => $rol,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Role::find($id);
        if (empty($rol))
        {
            return RespuestaHttp::respuesta(
                404,
                'Not Found',
                'Rol no encontrado',
                [
                    'rol' => ["No encontramos el rol buscado"]
                ]
            );
        }

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Rol enocontrado',
            [
                'rol' => $rol,
            ]
        );
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

        $validacion = Validator::make(
            $request->all(),
            [
                'id_rol' => 'required|exists:roles,id',
                'nombre_rol' => 'required',
            ],
            [
                'id_rol.required' => 'El rol es necesario',
                'id_rol.exists' => 'No encontramos el rol',
                'nombre_rol' => 'El nombre del rol es necesario'
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Errores en la informacion',
                $validacion->getMessageBag(),
            );
        }

        $rol = Role::findById($request->input('id_rol'));
        $rol->name = $request->input('nombre_rol');
        $rol->save();

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Rol actualizado exitosamente',
            [
                'rol' => $rol,
            ]
        );
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

    public function otorgarRol(Request $request)
    {
        $respuesta = $this->controlRol($request->all());
        return RespuestaHttp::respuestaObjeto($respuesta);
    }

    public function revocarRol(Request $request)
    {
        $respuesta = $this->controlRol($request->all(), true);
        return RespuestaHttp::respuestaObjeto($respuesta);
    }

    protected function controlRol(array $datosValidar, bool $revocar = false): RespuestaHttp
    {
        $validacion = Validator::make(
            $datosValidar,
            [
                'id_rol' => 'required|exists:roles,id',
                'id_usuario' => 'required|exists:users,id',
            ],
            [
                'id_rol.required' => 'El id del rol es necesario',
                'id_rol.exists' => 'El rol no es valido',
                'id_usuario.required' => 'El id del usuario es necesario',
                'id_usuario.exists' => 'El id del usurio no es valido',
            ]
        );

        if ($validacion->fails())
        {
            return new RespuestaHttp(
                400,
                'Bad request',
                'Erorres al validar la informacion',
                $validacion->getMessageBag()
            );
        }

        $rol = Role::find($datosValidar['id_rol']);
        $usuario = User::find($datosValidar['id_usuario']);

        if ($revocar)
        {
            $usuario->removeRole($rol->name);
            return new RespuestaHttp(
                200,
                'succes',
                'Rol revocado del usuario exitosamente',
                [
                    'usuario' => $usuario,
                ]
            );
        }

        $usuario->assignRole($rol->name);
        return new RespuestaHttp(
            200,
            'Succes',
            'Rol otorgado al usuario',
            [
                'usuario' => $usuario,
            ]
        );
    }
}
