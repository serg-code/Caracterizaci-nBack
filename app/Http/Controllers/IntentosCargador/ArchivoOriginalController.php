<?php

namespace App\Http\Controllers\IntentosCargador;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Intentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoOriginalController extends Controller
{

    private Intentos $intento;
    private string $disco;

    public function __construct(
    )
    {
        $this->intento = new Intentos();
        $this->disco = env('DISCO_GUARDAR_ARCHIVOS', 'cargadores');
    }

    public function archivoOriginal(Request $request, $idIntento)
    {
        $this->intento = Intentos::find($idIntento);
        if (empty($this->intento)) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No es id valido para efectuar la búsqueda',
            );
        }

        $existe = Storage::disk($this->disco)->exists($this->intento->nombre_archivo);

        if (!$existe) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'No encontramos el archivo asociado a este intento ',
                [
                    'archivo' => 'No encontramos el archivo solicitado'
                ]
            );
        }

        return Storage::disk($this->disco)->download($this->intento->nombre_archivo, $this->intento->nombre_archivo_original);
    }
}