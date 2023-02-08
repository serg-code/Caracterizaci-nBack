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
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
                'device' => 'required',
            ],
            [
                'email.required' => 'El correo es necesario',
                'email.email' => 'El correo ingresado debe se un correo valido',
                'password' => 'La contraseña es requerida',
                'device.required' => 'Nombre del dispositivo necesario',
            ]
        );

        //validar si los datos recibidos son validos
        if ($validacion->fails()) {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Se encontraron errores en la informacion',
                $validacion->getMessageBag()
            );
        }

        //realizar la autenticacion
        if (Auth::attempt($request->only('email', 'password'))) {
            $usuario = $request->user();
            if ($usuario->activo === 0) {
                return RespuestaHttp::respuesta(
                    403,
                    'Forbidden',
                    'El usuario no está activo',
                );
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

        return RespuestaHttp::respuesta(
            400,
            'Bad request',
            'Credenciales invalidas'
        );
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