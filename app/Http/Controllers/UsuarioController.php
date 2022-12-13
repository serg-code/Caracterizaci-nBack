<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Dev\Usuario\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            return RespuestaHttp::respuesta(
                400,
                'Bad Request',
                'Valide los datos',
                $validacion->getMessageBag()
            );
        }

        $usuario = new User($request->all());
        $usuario->save();
        $usuario->assignRole('Usuario');

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

        $respuesta->data = [
            // 'usuario' => User::find($usuario->id),
            'usuario' => $usuario,
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
