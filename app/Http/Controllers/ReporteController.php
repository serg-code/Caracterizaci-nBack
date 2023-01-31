<?php

namespace App\Http\Controllers;

use App\Dev\RespuestaHttp;
use App\Models\Reportes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReporteController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($reporteId)
    {
        $reporte = Reportes::find($reporteId);
        $variables = $reporte->variables;

        $datosQuery = $this->datosReemplazar($variables, $_GET);

        if (!empty($datosQuery['error']))
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'No encontramos datos necesarios',
                $datosQuery['error']
            );
        }

        // $query = str_replace($datosQuery['busqueda'], $datosQuery['remplazar'], $reporte->query);
        $query = str_replace($datosQuery['busqueda'], $datosQuery['remplazar'], $reporte->query);
        $consulta = DB::select($query);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Reporte',
            [
                'consulta' => $consulta,
            ]
        );
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function datosReemplazar($variables, array $parametrosUrl): array
    {
        $busqueda = [];
        $remplazar = [];
        $error = [];

        foreach ($variables as $variable)
        {
            $referencia = $variable->ref;
            if (empty($parametrosUrl[$referencia]))
            {
                $error[$referencia] = "No encontramos $referencia";
                continue;
            }

            $dato = $this->convertirDato($variable->tipo, $parametrosUrl[$referencia]);
            if (empty($dato))
            {
                $error[$referencia] = "$referencia no es del tipo de dato necesario";
                continue;
            }

            array_push($busqueda, ":$referencia");
            array_push($remplazar, $dato);
        }


        return [
            'busqueda' => $busqueda,
            'remplazar' => $remplazar,
            'error' => $error,
        ];
    }

    private function convertirDato(string $tipoDato, $dato)
    {

        try
        {
            return match ($tipoDato)
            {
                'date' => $this->validacion($dato, 'date') ? "'" . Carbon::parse($dato) . "'" : null,
                'number' => is_numeric($dato) ? $dato : null,
                'text' => $this->validacion($dato, 'string') ? "'$dato'" : null,
            };
        }
        catch (\Throwable $th)
        {
            return null;
        }
    }

    private function validacion($dato, $reglaValidacion): bool
    {
        $validador = Validator::make(
            [
                'dato' => $dato
            ],
            [
                'dato' => $reglaValidacion
            ]
        );

        return !$validador->fails();
    }
}
