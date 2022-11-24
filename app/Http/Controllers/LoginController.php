<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validacion = Validator::make(
            data: $request->all(),
            rules: [
                'email' => 'required|email',
                'password' => 'required',
                'device' => 'required',
            ],
            messages: [
                'email.required' => 'El correo es necesario',
                'email.email' => 'El correo ingresado debe se un correo valido',
                'password' => 'La contraseña es requerida',
                'device.required' => 'Nombre del dispositivo necesario',
            ]
        );

        //validar si los datos recibidos son validos
        if ($validacion->fails())
        {
            $respuesta = new RespuestaHttp(
                codigoHttp: 400,
                titulo: 'Bad request',
                data: $validacion->getMessageBag()
            );
            return response()->json(data: $respuesta, status: $respuesta->codigoHttp);
        }

        //realizar la autenticacion
        if (Auth::attempt($request->only('email', 'password')))
        {
            $usuario = $request->user();
            if ($usuario->activo === 0)
            {
                $respuesta = new RespuestaHttp(
                    403,
                    'Forbidden',
                    'El usuario no está activo',
                );
                return response()->json($respuesta, $respuesta->codigoHttp);
            }

            $respuesta = new RespuestaHttp();
            $respuesta->data = [
                'token' => $usuario->createToken($request->input('device'))->plainTextToken,
                'tipoToken' => 'Bearer',
                'usuario' => $usuario,
            ];

            return response()->json(
                data: $respuesta,
                status: $respuesta->codigoHttp
            );
        }

        $respuesta = new RespuestaHttp(
            codigoHttp: 400,
            titulo: 'Bad request',
            mensaje: 'Credenciales invalidas'
        );
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    public function saludar(Request $request)
    {
        $respuesta = new RespuestaHttp();
        $respuesta->mensaje = 'Todo va bien';
        return response()->json(data: $respuesta, status: $respuesta->codigoHttp);
    }

    public function cerrar(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $respuesta = new RespuestaHttp();
        $respuesta->mensaje = 'Ha terminado la sesion';

        return response()->json(
            data: $respuesta,
            status: $respuesta->codigoHttp
        );
    }
}
