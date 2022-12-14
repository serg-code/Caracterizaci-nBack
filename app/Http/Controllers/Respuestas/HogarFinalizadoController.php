<?php

namespace App\Http\Controllers\Respuestas;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HogarFinalizadoController extends Controller
{
    public function finalizarHogar(Request $request)
    {
        return RespuestaHttp::respuesta(400, 'mal', 'mal', []);
    }
}
