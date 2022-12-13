<?php

namespace App\Http\Controllers;

use App\Dev\Encuesta\SeccionesIntegrante;
use App\Dev\Integrante;
use App\Dev\RespuestaHttp;
use App\Models\Hogar\Hogar;
use App\Models\Integrantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntegrantesController extends Controller
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

        $id = $integrantePeticion['id'];
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
        $errores = Integrante::validarCrearIntegrante($datos);

        if (!empty($errores))
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Algunos datos son erroneso',
                $errores
            );
        }

        $integrante = Integrantes::guardarIntegrante($datos);
        $secciones = $datos['secciones'];
        $integrante = $this->recorrecSecciones($integrante, $secciones);

        $this->actulizarEncuestaHogar($integrante->hogar_id, $encuesta);

        return RespuestaHttp::respuesta(
            201,
            'Created',
            'Integrante creado exitosamente',
            [
                'integrante' => $integrante,
            ]
        );
    }

    protected function actualizarIntegrante(array $datosActualizar, array $encuesta)
    {
        $integrante = Integrantes::actualizarIntegrante($datosActualizar);

        $secciones = $datosActualizar['secciones'];
        $integrante = $this->recorrecSecciones($integrante, $secciones);

        $this->actulizarEncuestaHogar($integrante->hogar_id, $encuesta);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Integrante actualizado',
            [
                'integrante' => $integrante,
            ]
        );
    }


    protected function recorrecSecciones(Integrantes $integrante, array $secciones = []): Integrantes
    {
        if (!empty($secciones))
        {
            $seccionesIntegrante = new SeccionesIntegrante($integrante, $secciones);
            $seccionesIntegrante->recorrerSecciones();
            $integrante->puntaje_obtenido = $seccionesIntegrante->puntaje;
            $integrante->update($integrante->attributesToArray());
            return $integrante;
        }

        return $integrante;
    }

    protected function actulizarEncuestaHogar(string $hogarId, array $encuesta)
    {
        $hogar = new Hogar();

        $hogar->actualizarHogar([
            'id' => $hogarId,
            'encuesta' => $encuesta,
        ]);
    }
}
