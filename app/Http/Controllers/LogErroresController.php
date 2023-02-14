<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Exports\LogErroresExpor;
use App\Models\Intentos;
use App\Models\LogErrores;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LogErroresController extends Controller
{
    public function descargarLog($idIntento)
    {
        $intento = Intentos::find($idIntento);

        if (empty($intento)) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No encontramos el archivo solicitado'
            );
        }

        $errores = LogErrores::where('intento', $idIntento)->get();
        $fecha = now();
        return Excel::download(new LogErroresExpor($errores), "Errores Intento No $idIntento - $fecha.xlsx");
    }
}