<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\Cargadores;
use Illuminate\Http\Request;

class CargadoresController extends Controller
{
    private Cargadores $cargador;

    public function __construct()
    {
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($idCargador)
    {
        $this->cargador = Cargadores::where('id', $idCargador)->with(['usuarioCrea', 'intentos.usuario'])->first();

        if (empty($this->cargador)) {
            return RespuestaHttp::respuesta(
                404,
                'Not found',
                'Cargador no encontrado'
            );
        }

        // $this->cargador->intentos;
        return RespuestaHttp::respuesta(200, 'succes', 'Cargador', [$this->cargador]);
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