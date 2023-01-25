<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Dev\Usuario\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? env('LIMITEPAGINA_USUARIO', 20);
        $respuesta = new RespuestaHttp();

        if (empty($datosUrl))
        {
            $usuarios = User::where('id', '!=', 1)
                ->paginate($cantidadPaginar);
            $respuesta->data = $usuarios;
        }

        $usuarios = QueryBuilder::for(User::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'name',
                AllowedFilter::exact('email'),
                'activo',
                AllowedFilter::scope('search'),
            ])
            ->where('id', '!=', 1)
            ->paginate($cantidadPaginar);

        $respuesta->data = $usuarios;

        return response()->json($respuesta, $respuesta->codigoHttp);
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
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'tipo_identificacion' => 'required|exists:tipo_identificacion,id',
                'identificacion' => 'required|unique:users,identificacion',
                'telefono' => 'required',
            ],
            [
                'name.required' => 'La contraseña es necesaria',
                'email.required' => 'El correo es necesario',
                'email.email' => 'El correo ingresado debe se un correo valido',
                'email.unique' => 'El correo no es valido',
                'password' => 'La contraseña es requerida',
                'tipo_identificacion.required' => 'El tipo de identificacion es necesario',
                'tipo_identificacion.exist' => 'El tipo de identificacion no es valido',
                'identificacion.required' => 'La identificacion es necesaria',
                'identificacion.unique' => 'Esta identifiacion ya fue registrado',
                'telefono.required' => 'El telefono es necesario',
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad Request',
                'Valide los datos',
                $validacion->getMessageBag()
            );
        }

        $usuario = new User($request->all());
        $usuario->save();
        $roles = $request->input('roles');
        if (empty($roles))
        {
            $usuario->assignRole('Usuario');
        }

        if (!empty($roles))
        {
            $estadoRoles = $this->controlRol($request->all(), $usuario->id);
            return RespuestaHttp::respuestaObjeto($estadoRoles);
        }

        return RespuestaHttp::respuesta(
            200,
            'Created',
            'Usuario creado exitosamente'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        $usuario->getRoleNames();
        $listado = $usuario->getAllPermissions();
        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'usuario' => $usuario,
            'permisos' => $listado,
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
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
        $usuario = User::find($id);
        $usuarioAuth = $request->user();
        $actualizarUsuario = new Usuario($usuario, $request);

        if (empty($usuarioAuth) || empty($usuario) || !$actualizarUsuario->permitir())
        {
            return RespuestaHttp::respuesta(
                401,
                'Unauthorized',
                'No puede realizar esta accion'
            );
        }

        $respuesta = $actualizarUsuario->modificarUsuario();

        $roles = $request->input('roles');
        if (empty($roles))
        {
            $usuario->assignRole('Usuario');
        }

        if (!empty($roles))
        {
            $estadoRoles = $this->controlRol($request->all(), $id);
            return RespuestaHttp::respuestaObjeto($estadoRoles);
        }

        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $usuario = User::find($id);
        $usuarioAuth = $request->user();

        if (empty($usuarioAuth) || empty($usuario) || $usuarioAuth->id !== $usuario->id)
        {
            return RespuestaHttp::respuesta(
                403,
                'Forbiden',
                'Algo ha salido mal'
            );
        }

        $usuario->update(['activo' => false]);
        $usuario->tokens()->delete();
        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Usuario desactivado exitosamente'
        );
    }

    public function actual(Request $request)
    {
        $usuario = $request->user();
        $respuesta = new RespuestaHttp();
        $usuario = User::find($usuario->id);
        $usuario->permisos = $usuario->getAllPermissions();
        unset($usuario->roles, $usuario->permissions);
        $usuario->getRoleNames();


        $respuesta->data = [
            // 'usuario' => User::find($usuario->id),
            'usuario' => $usuario,
        ];

        return response()->json($respuesta, $respuesta->codigoHttp);
    }
    protected function controlRol(array $datosValidar, int $id, bool $revocar = false): RespuestaHttp
    {
        $validacion = Validator::make(
            $datosValidar,
            [
                // 'id_usuario' => 'required|exists:users,id',
                'roles' => 'required|array',
            ],
            [
                'id_usuario.required' => 'El id del usuario es necesario',
                'id_usuario.exists' => 'El id del usurio no es valido',
                'roles.required' => 'El listado de roles es necesario',
                'roles.array' => 'Se esperaba un listado de roles'
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

        $listadoRoles = $this->obtenerNombreRoles($datosValidar['roles']);
        $usuario = User::find($id);

        if ($revocar)
        {
            foreach ($listadoRoles as $nombreRol)
            {
                $usuario->removeRole($nombreRol);
            }

            return new RespuestaHttp(
                200,
                'succes',
                'Rol revocado del usuario exitosamente',
                [
                    'usuario' => $usuario,
                ]
            );
        }

        $usuario->syncRoles($listadoRoles);
        return new RespuestaHttp(
            200,
            'Succes',
            'Rol otorgado al usuario',
            [
                'usuario' => $usuario,
            ]
        );
    }

    protected function obtenerNombreRoles(array $listadoRoles): array
    {
        return array_map(function ($idRol)
        {
            $rol = Role::find($idRol);
            return $rol->name ?? null;
        }, $listadoRoles);
    }
}
