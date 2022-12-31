<?php

namespace App\Http\Controllers;

use App\Dev\ControlIntegrante;
use App\Dev\Encuesta\Secciones;
use App\Dev\Encuesta\SeccionesIntegrante;
use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;
use App\Models\Integrantes;
use App\Models\Secciones\Integrantes\Accidente;
use App\Models\Secciones\Integrantes\CuidadoDomiciliario;
use App\Models\Secciones\Integrantes\CuidadoEnfermedad;
use App\Models\Secciones\Integrantes\EnfermedadesSaludPublica;
use App\Models\Secciones\Integrantes\Morbilidad;
use App\Models\Secciones\Integrantes\SaludMental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IntegrantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosUrl = $_GET;
        $cantidadPaginar = $datosUrl['per_page'] ?? 10;
        $respuesta = new RespuestaHttp();

        if (empty($datosUrl))
        {
            $usuarios = Integrantes::all();
            $respuesta->data = $usuarios;
        }

        $usuarios = QueryBuilder::for(Integrantes::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'name',
                AllowedFilter::exact('email'),
                'activo',
                AllowedFilter::scope('search'),
            ])
            ->paginate($cantidadPaginar);

        $respuesta->data = $usuarios;

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
        $validacion = Validator::make(
            $request->all(),
            [
                'encuesta' => 'required',
                'integrante' => 'required',
            ],
            [
                'encuesta.required' => 'Los datos de la encuesta son necesarios',
                'integrante.required' => 'Los datos del integrante son necesarios',
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Error en algunos datos',
                $validacion->getMessageBag()
            );
        }


        $integrantePeticion = $request->input('integrante');
        $encuesta = $request->input('encuesta');

        $id = $integrantePeticion['id'] ?? 'a';
        $integrante = Integrantes::find($id);

        if (empty($integrante))
        {
            return $this->crearIntegrante($integrantePeticion, $encuesta);
        }

        return $this->actualizarIntegrante($integrantePeticion, $encuesta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $integrante = Integrantes::find($id);

        if (empty($integrante))
        {
            return $this->noEncontrado();
        }

        $respuesta = new RespuestaHttp(
            200,
            'succes',
            'integrante encontrado',
            [
                "integrante" => $integrante,
            ]
        );
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    public function update(Request $request, $id)
    {
        // code ...
    }

    public function destroy($id)
    {
        $integrante = Integrantes::find($id);

        if (empty($integrante))
        {
            return $this->noEncontrado();
        }

        $seccionesIntegrantes = SeccionesIntegrante::obtenerSecciones();
        foreach ($seccionesIntegrantes as $seccion)
        {
            $this->seleccionarSeccion($seccion, $id);
        }

        $integrante->delete();

        $respuesta = new RespuestaHttp(
            200,
            'succes',
            'Integrante eliminado'
        );
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    protected function noEncontrado()
    {
        return RespuestaHttp::respuesta(
            404,
            'not found',
            'Integrante no encontrado',
        );
    }

    protected function crearIntegrante(array $datos, $encuesta)
    {
        $controlIntegrante = new ControlIntegrante($datos, $encuesta);
        return $controlIntegrante->crearIntegrante();
    }

    protected function actualizarIntegrante(array $datosActualizar, array $encuesta)
    {
        $controlIntegrante = new ControlIntegrante($datosActualizar, $encuesta);
        return $controlIntegrante->actualizarIntegrante();
    }

    protected static function seleccionarSeccion(string $seccion, string $id)
    {
        return match ($seccion)
        {
            //secciones de integrantes
            'accidentes' => Accidente::where('id_integrante', '=', $id)->delete(),
            'cuidado_enfermedades' => CuidadoEnfermedad::where('id_integrante', '=', $id)->delete(),
            'cuidados_domiciliarios' => CuidadoDomiciliario::where('id_integrante', '=', $id)->delete(),
            'enfermedades_salud_publica' => EnfermedadesSaludPublica::where('id_integrante', '=', $id)->delete(),
            'morbilidad' => Morbilidad::where('id_integrante', '=', $id)->delete(),
            'salud_mental' => SaludMental::where('id_integrante', '=', $id)->delete(),

            default => null,
        };
    }
}
