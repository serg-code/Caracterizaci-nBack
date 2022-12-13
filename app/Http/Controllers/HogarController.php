<?php

namespace App\Http\Controllers;

use App\Dev\Encuesta\SeccionesHogar;
use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;
use App\Models\Secciones\Hogar\FactoresProtectores;
use App\Models\Secciones\Hogar\HabitosConsumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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

        $listadoHogares = Hogar::paginate($cantidadPaginar);

        $respuesta = new RespuestaHttp(
            200,
            'Succes',
            'Listado de Hogares',
            $listadoHogares
        );
        return response()->json($respuesta, $respuesta->codigoHttp);


        if (empty($datosUrl))
        {
            $listadoHogares = Hogar::paginate($cantidadPaginar);

            $respuesta = new RespuestaHttp(
                200,
                'Succes',
                'Listado de Hogares',
                $listadoHogares
            );

            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        //filter search
        //filtro de usuarios
        $hogares = QueryBuilder::for(Hogar::class)
            ->allowedFilters([
                AllowedFilter::scope('search'),
                // 'id',
                // 'zona',
                // 'cod_dpto',
                // 'cod_mun',
                // 'tipo'
            ])
            ->paginate($cantidadPaginar);

        $respuesta = new RespuestaHttp(
            200,
            'succes',
            'listado de hogares',
            $hogares
        );

        return response()->json($respuesta, $respuesta->codigoHttp);
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
            return $this->crearHogar($request->input('hogar'));
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

    protected function crearHogar($datos)
    {
        $validador = Validator::make(
            $datos,
            [
                // 'zona' => 'required',
                // 'cod_dpto' => 'required|exists:departamentos,codigo_dane',
                // 'cod_mun' => 'required|exists:municipios,codigo_dane',
                // 'barrio' => 'required',
                // 'direccion' => 'required',
            ],
            [
                'zona.required' => 'La zona es necesaria',
                'cod_dpto.required' => 'Departamento necesario',
                'cod_dpto.exists' => 'El codigo del departamento no es valido',
                'cod_mun.required' => 'Municion necesario',
                'cod_mun.exists' => 'El codigo del municipio no es valido',
                'barrio.required' => 'El barrio es necesario',
                'direccion.required' => 'La direccion es necesaria',
            ]
        );

        if ($validador->fails())
        {
            $respuesta = new RespuestaHttp(400, 'bad request', 'Valide la informaicon', $validador->getMessageBag());
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $hogar = new Hogar($datos);
        $hogar->encuesta = null;
        $hogar->save();
        // $hogar = Hogar::actualizarHogar([
        //     'id' => $hogar->id,
        //     'encuesta' => $datos['encuesta'],
        // ]);
        // $secciones = $datos['secciones'] ?? null;
        // if (!empty($secciones))
        // {

        //     $hogar = $this->recorrecSecciones($hogar, $secciones);
        // }

        $respuesta = new RespuestaHttp();
        $respuesta->data = [
            'hogar' => $hogar,
        ];
        return response()->json($respuesta, $respuesta->codigoHttp);
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
