<?php

namespace App\Http\Controllers;

use App\Dev\Encuesta\SeccionesIntegrante;
use App\Dev\RespuestaHttp;
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
        $id = $request->input('id');
        $integrante = Integrantes::find($id);

        if (empty($integrante))
        {
            return $this->crearIntegrante($request->all());
        }

        $integranteActualizado = $this->actualizarIntegrante($request);
        $respuesta = new RespuestaHttp(
            200,
            'succes',
            'Integrante Actualizado',
            [
                'integrante' => $integranteActualizado,
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
        //
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
        $respuesta = new RespuestaHttp(
            404,
            'not found',
            'Integrante no encontrado',
        );
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    protected function crearIntegrante(array $datos)
    {
        $validador = Validator::make(
            $datos,
            [
                'hogar_id' => 'required',
                'tipo_identificacion' => 'required|exists:tipo_identificacion,id',
                'identificacion' => 'required',
                'primer_nombre' => 'required',
                'primer_apellido' => 'required',
                'rh' => 'required',
                'estado_civil' => 'required',
                'correo' => 'email'
            ],
            [
                'hogar_id.required' => 'El id del hogar (hogar_id) es necesario',
                'tipo_identificacion.required' => 'El tipo de indentificacion es obligatorio',
                'tipo_identificacion.exist' => 'El tipo de identificacion no es valido',
                'identificacion.required' => 'La identificacion es obligatoria',
                'primer_nombre.required' => 'El primer_nombre es obligatoria',
                'primer_apellido.required' => 'El primer_apellido es obligatoria',
                'rh.required' => 'El rh es obligatoria',
                'estado_civil.required' => 'El estado_civil es obligatoria',
                'correo.required' => 'El correo es obligatoria',
            ]
        );

        if ($validador->fails())
        {
            $respuesta = new RespuestaHttp(
                400,
                'Bad request',
                'Algunos datos son erroneso',
                $validador->getMessageBag()
            );
            return response()->json($respuesta, $respuesta->codigoHttp);
        }

        $integrante = Integrantes::guardarIntegrante($datos);
        $secciones = $datos['secciones'];
        $integrante = $this->recorrecSecciones($integrante, $secciones);


        $respuesta = new RespuestaHttp(
            201,
            'Created',
            'Integrante creado exitosamente',
            [
                'integrante' => $integrante,
            ]
        );
        return response()->json($respuesta, $respuesta->codigoHttp);
    }

    protected function actualizarIntegrante(Request $request)
    {
        $integrante = Integrantes::actualizarIntegrante($request->all());

        $secciones = $request->input('secciones');
        $integrante = $this->recorrecSecciones($integrante, $secciones);
        $respuesta = new RespuestaHttp(
            200,
            'succes',
            'Integrante actualizado',
            [
                'integrante' => $integrante,
            ]
        );

        return response()->json($respuesta, $respuesta->codigoHttp);
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
}
