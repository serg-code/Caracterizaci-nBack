<?php

namespace App\Http\Controllers;

use App\Dev\Encuesta\SeccionesHogar;
use App\Dev\Hogar\crearHogar;
use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;
use App\Models\Secciones\Hogar\FactoresProtectores;
use App\Models\Secciones\Hogar\HabitosConsumo;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class HogarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? env('LIMITEPAGINA_USUARIO', 10);

        if (empty($datosUrl))
        {
            $listadoHogares = Hogar::paginate($cantidadPaginar);

            return RespuestaHttp::respuesta(
                200,
                'Succes',
                'Listado de Hogares',
                $listadoHogares
            );
        }

        //filtro de usuarios
        $hogares = QueryBuilder::for(Hogar::class)
            ->allowedFilters([
                AllowedFilter::scope('search'),
                AllowedFilter::exact('id'),
                'zona',
                'cod_dpto',
                'cod_mun',
                'tipo'
            ])
            ->paginate($cantidadPaginar);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'listado de hogares',
            $hogares
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hogarPeticion = $request->input('hogar');
        $id = $hogarPeticion['id'];
        $hogar = Hogar::find($id);

        if (empty($hogar))
        {
            $datosHogar = $request->input('hogar');
            $crearHogar = new crearHogar($datosHogar);
            $respuestaCrearHogar = $crearHogar->getRespuesta();
            return RespuestaHttp::respuestaObjeto($respuestaCrearHogar);
        }

        $hogar = Hogar::actualizarHogar($hogarPeticion);
        $secciones = $hogarPeticion['secciones'];
        $hogar = $this->recorrecSecciones($hogar, $secciones);
        $hogar->integrantes;
        $respuesta = new RespuestaHttp(
            200,
            'succes',
            'hogar actualizado',
            [
                'hogar' => $hogar,
            ]
        );
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hogar = Hogar::findOrFail($id);
        $hogar->integrantes;
        $hogar->secciones = [
            'factores_protectores' => FactoresProtectores::where('hogar_id', '=', $id)->latest()->first(),
            'habitos_consumo' => HabitosConsumo::where('hogar_id', '=', $id)->latest()->first(),
        ];

        $respuesta = new RespuestaHttp();
        $respuesta->data = $hogar;

        return response()->json($respuesta, $respuesta->codigoHttp);
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


    protected function recorrecSecciones(Hogar $hogar, array $secciones = []): Hogar
    {
        if (empty($secciones))
        {
            return $hogar;
        }

        $seccionesHogar = new SeccionesHogar($hogar, $secciones);
        $seccionesHogar->recorrer();
        $hogar->puntaje_obtenido = $seccionesHogar->puntaje;
        $hogar->update($hogar->attributesToArray());

        return $hogar;
    }
}
