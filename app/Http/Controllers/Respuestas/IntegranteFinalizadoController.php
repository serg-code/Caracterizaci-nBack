<?php

namespace App\Http\Controllers\Respuestas;

use App\Dev\ControlIntegrante;
use App\Dev\Encuesta\SeccionesIntegrante;
use App\Dev\RespuestaHttp;
use App\Http\Controllers\Controller;
use App\Models\respuestas\RespuestaIntegrante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntegranteFinalizadoController extends Controller
{
    public function finalizarIntegrante(Request $request)
    {
        $validacion = Validator::make(
            $request->all(),
            [
                'integrante' => 'required',
                'encuesta' => 'required',
            ],
            [
                'integrante.required' => 'El integrante es necesario',
                'encuesta.required' => 'La encuesta es necesaria',
            ]
        );

        if ($validacion->fails())
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'No encontramos algunos datos',
                $validacion->getMessageBag()
            );
        }

        $integrante = $request->input('integrante');
        $encuesta = $request->input('encuesta');

        $controlIntegrante = new ControlIntegrante($integrante, $encuesta);
        $controlIntegrante->actualizarIntegrante(false);
        $errores = $controlIntegrante->getErrores();

        if (!empty($errores))
        {
            return RespuestaHttp::respuesta(
                400,
                'bad request',
                'Encontramos algunos errores en la informacion',
                [
                    $errores,

                ]
            );
        }

        //* guardado final
        $secciones = $integrante['secciones'];

        $errorSecciones = $this->validarSecciones($secciones);

        $errores = array_merge($errorSecciones);

        if (!empty($errores))
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Encontramos unos errores en la validacion',
                $errores
            );
        }

        $integrante = $controlIntegrante->getIntegrante();
        $respuestasIintegrante = new RespuestaIntegrante(['id_integrante' => $integrante->id]);
        $respuestasIintegrante->eliminarRespuestas();

        foreach ($secciones as $seccion)
        {
            $respuestas = $seccion['respuestas'];
            $controlIntegrante->guardadoFinal($respuestas);
        }

        $integrante = $integrante->actualizarIntegrante([
            'id' => $integrante->id,
            'estado_registro' => 'FINALIZADO'
        ]);

        return RespuestaHttp::respuesta(
            201,
            'succes',
            'Encuesta validada y guardada exitosamente',
            [
                'integrante' => $integrante,
            ]
        );
    }

    protected function validarSecciones(array $secciones = []): array
    {
        $errores = [];
        $listado = SeccionesIntegrante::obtenerSecciones();

        foreach ($listado as $seccion)
        {
            $seccionEncontrada = $this->buscarSeccion($seccion, $secciones);
            if ($seccionEncontrada === false)
            {
                $errores[$seccion] = [
                    "No encontramos la seccion $seccion"
                ];
            }
        }

        return $errores;
    }

    protected function buscarSeccion(string $refSeccion, array $secciones): bool
    {
        foreach ($secciones as $seccion)
        {
            if ($seccion['ref_seccion'] === $refSeccion)
            {
                return true;
            }
        }

        return false;
    }
}
