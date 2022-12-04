<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Dev\Usuario\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $cantidadPaginar = $datosUrl['cantidad'] ?? env('LIMITEPAGINA_USUARIO', 20);
        $respuesta = new RespuestaHttp();

        if (empty($datosUrl))
        {
            $usuarios = User::where('id', '!=', 1)
                ->paginate($cantidadPaginar);
            $respuesta->data = $usuarios;
        }

        $usuarios = QueryBuilder::for(User::class)
            ->allowedFilters(['id', 'email', 'activo', 'created_at'])
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
            ],
            [
                'name.required' => 'La contraseña es necesaria',
                'email.required' => 'El correo es necesario',
                'email.email' => 'El correo ingresado debe se un correo valido',
                'email.unique' => 'El correo no es valido',
                'password' => 'La contraseña es requerida',
            ]
        );

        if ($validacion->fails())
        {
            $respuesta = new RespuestaHttp(
                400,
                'Bad Request',
                'Valide los datos',
                $validacion->getMessageBag()
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $usuario = new User($request->all());
        $usuario->save();
        $usuario->assignRole('Usuario');
        $respuesta = new RespuestaHttp(
            codigoHttp: 200,
            titulo: 'Created'
        );
        return response()->json($respuesta, $respuesta->codigoHttp);
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
        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'usuario' => $usuario
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

        if (empty($usuarioAuth) || empty($usuario) || $usuarioAuth->id !== $usuario->id)
        {
            $respuesta = new RespuestaHttp(
                401,
                'Unauthorized',
                'No puede realizar esta accion'
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $respuesta = Usuario::modificarUsuario($usuario, $request->method(), $request->all());
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
            $respuesta = new RespuestaHttp(
                403,
                'Forbiden',
                'Algo ha salido mal'
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $usuario->update(['activo' => false]);
        $usuario->tokens()->delete();
        $repuesta = new RespuestaHttp(
            200,
            'succes',
            'Usuario desactivado exitosamente'
        );
        return response()->json($repuesta, $repuesta->codigoHttp);
    }

    public function actual(Request $request)
    {
        $usuario = $request->user();
        $respuesta = new RespuestaHttp();
        $usuario = User::find($usuario->id);
        $usuario->permissions;
        $usuario->roles;
        $usuario->getAllPermissions();
        $respuesta->data = [
            // 'usuario' => User::find($usuario->id),
            'usuario' => $usuario
        ];

        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    protected function calcularInicioPaginacion(int $pagina, int $cantidadMostar): int
    {
        if ($pagina === 1 || $pagina <= 0)
        {
            return 0;
        }

        return ($cantidadMostar * ($pagina - 1));
    }
}
