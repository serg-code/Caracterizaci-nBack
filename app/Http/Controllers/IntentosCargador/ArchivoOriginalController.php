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
                'No encontramos el archivo solcitado',
            );
        }

        $path = Storage::disk($this->disco)->path($this->intento->nombre_archivo);
        // dd($path);
        // return Storage::disk($this->disco)->downloadAs($this->$idIntento->nombre_archivo, $this->intento->nombre_archivo_original);
        return Storage::download($this->intento->nombre_archivo, $this->intento->nombre_archivo_original);
    }
}