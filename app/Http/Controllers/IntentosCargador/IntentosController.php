<?php

namespace App\Http\Controllers\IntentosCargador;

use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\Intentos;
use Illuminate\Http\Request;

class IntentosController extends Controller
{
    private Intentos $intento;
    private string $apiUrl;

    public function __construct(
    )
    {
        $this->apiUrl = env('APP_URL', 'http://localhost');
        $this->intento = new Intentos();
    }

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($idIntento)
    {
        $this->intento = Intentos::find($idIntento);

        if (empty($this->intento)) {
            return RespuestaHttp::respuesta(
                404,
                'Not Found',
                'No encontramos el intento buscado'
            );
        }

        $this->intento->cargador;
        $urlArchivoOriginal = $this->apiUrl . '/api/cargador/archivo/' . $this->intento->id;
        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Intento encontrado',
            [
                'intento' => $this->intento,
                'urlArchivoOriginal' => $urlArchivoOriginal,
            ]
        );
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}