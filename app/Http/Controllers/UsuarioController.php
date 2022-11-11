<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $respuesta = new Respuesta(
                400,
                'Bad Request',
                'Valide los datos',
                $validacion->getMessageBag()
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $usuario = new User($request->all());
        $usuario->save();
        $respuesta = new Respuesta(
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
        $respuesta = new Respuesta();
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
        //3|xfH7Fgu0TNTm4X8KG8iUygKKwdYScIwvC6IXPbi8
        //6|LuaDnZ5hlgFuesg8qt5EPHEtL4wI8Fel5j3PAYmZ
        $usuario = User::find($id);
        $usuarioAuth = $request->user();

        if (empty($usuarioAuth) || empty($usuario) || $usuarioAuth->id !== $usuario->id)
        {
            $respuesta = new Respuesta(
                401,
                'Unauthorized',
                'No puede realizar esta accion'
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $actualizar = [];

        //saber si la peticion va por PUT o PATCH
        if ($request->method() === 'PATCH')
        {
            $validador = Validator::make(
                $request->all(),
                [
                    'password' => 'required',
                    'confirmPassword' => 'required|same:password',
                ],
                [
                    'password.required' => 'La contraseña es necesaria',
                    'confirmPassword.required' => 'Se necesita confirmar la contraseña',
                    'confirmPassword.same' => 'Las contraseñas no coinciden '
                ]
            );

            if ($validador->fails())
            {
                $respuesta = new Respuesta(
                    400,
                    'Bad request',
                    'algunos datos no son validos',
                    $validador->getMessageBag()
                );
                return response()->json($respuesta, $respuesta->codigoHttp);
            }

            $actualizar = [
                'password' => bcrypt($request->input('password'))

            ];

            $usuario = new User(array($usuario));
            $usuario->tokens()->delete();
        }

        if ($request->method() === 'PUT')
        {
            $datos = $request->all();
            $validador = Validator::make(
                $datos,
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                ],
                [
                    'name.required' => 'El nombre es necesario',
                    'email.required' => 'El correo es necesario',
                    'email.email' => 'El correo debe ser valido',
                    'email.unique' => 'Este correo no es valido',
                ]
            );

            if ($validador->fails())
            {
                $respuesta = new Respuesta(
                    400,
                    'Bad request',
                    'algunos datos no son validos',
                    $validador->getMessageBag()
                );
                return response()->json($respuesta, $respuesta->codigoHttp);
            }

            $actualizar = [
                'name' => $datos['name'],
                'email' => $datos['email'],
            ];
        }

        $usuarioActualizado = new User();
        $usuarioActualizado->where('id', '=', $usuario->id)
            ->update($actualizar);

        $respuesta = new Respuesta();
        $respuesta->data = [
            'actual' => $actualizar,
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        //
    }
}
