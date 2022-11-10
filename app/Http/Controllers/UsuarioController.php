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
                'nombre' => 'required',
                'correo' => 'required|email|unique:users,email',
                'contrasena' => 'required',
            ],
            [
                'nombre.required' => 'La contraseña es necesaria',
                'correo.required' => 'El correo es necesario',
                'correo.email' => 'El correo ingresado debe se un correo valido',
                'correo.unique' => 'El correo no es valido',
                'contrasena' => 'La contraseña es requerida',
            ]
        );

        if ($validacion->fails())
        {
            $respuesta = new Respuesta(
                400,
                'Bad Request',
                array(
                    $validacion->getMessageBag()
                )
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $usuario = new User([
            'name' => $request->input('nombre'),
            'email' => $request->input('correo'),
            'password' => $request->input('contrasena'),
        ]);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
