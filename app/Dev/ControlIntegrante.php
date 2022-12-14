<?php

namespace App\Dev;

use App\Dev\Encuesta\SeccionesIntegrante;
use App\Models\Hogar\Hogar;
use App\Models\Integrantes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class ControlIntegrante
{

    protected array $errores;
    protected Integrantes $integrante;

    public function __construct(
        protected array $datosIntegrante,
        protected $encuesta
    )
    {
        $this->errores = [];
    }

    public function crearIntegrante()
    {
        $errores = $this->validarCrearIntegrante($this->datosIntegrante);
        if (!empty($errores))
        {
            return RespuestaHttp::respuesta(
                400,
                'Bad request',
                'Algunos datos son erroneso',
                $errores
            );
        }

        $integrante = Integrantes::guardarIntegrante($this->datosIntegrante);
        $secciones = $this->datosIntegrante['secciones'];
        if (!empty($secciones))
        {
            $integrante = $this->recorrecSecciones($secciones);
        }

        $this->actulizarEncuestaHogar($integrante->hogar_id);

        return RespuestaHttp::respuesta(
            201,
            'Created',
            'Integrante creado exitosamente',
            [
                'integrante' => $integrante,
            ]
        );
    }

    public function actualizarIntegrante()
    {
        $integrante = Integrantes::actualizarIntegrante($this->datosIntegrante);
        $this->integrante = $integrante;

        $secciones = $this->datosIntegrante['secciones'];
        $integrante = $this->recorrecSecciones($secciones);
        // return RespuestaHttp::respuesta(400, 'mal', 'mal', ["datos" => $integrante]);

        $this->actulizarEncuestaHogar($integrante->hogar_id);

        return RespuestaHttp::respuesta(
            200,
            'succes',
            'Integrante actualizado',
            [
                'integrante' => $integrante,
            ]
        );
    }

    protected function recorrecSecciones(array $secciones = []): Integrantes
    {
        $integrante = $this->integrante;

        if (!empty($secciones))
        {
            $seccionesIntegrante = new SeccionesIntegrante($integrante, $secciones);
            $seccionesIntegrante->recorrerSecciones();
            $integrante->puntaje_obtenido = $seccionesIntegrante->puntaje;
            $this->errores = $seccionesIntegrante->getErrores();
            $integrante->update($integrante->attributesToArray());
            return $integrante;
        }

        return $integrante;
    }

    protected function actulizarEncuestaHogar(string $hogarId)
    {
        $hogar = new Hogar();

        $hogar->actualizarHogar([
            'id' => $hogarId,
            'encuesta' => $this->encuesta,
        ]);
    }

    public function validarCrearIntegrante(array $datosIntegrante): ?MessageBag
    {
        $validacion = Validator::make(
            $datosIntegrante,
            [
                'hogar_id' => 'required|exists:hogar,id',
                'tipo_identificacion' => 'required|exists:tipo_identificacion,id',
                'identificacion' => 'required',
                'primer_nombre' => 'required',
                'primer_apellido' => 'required',
                'rh' => 'required',
                'estado_civil' => 'required',
                'correo' => 'email'
            ],
            [
                'hogar_id.required' => 'El id del hogar es necesario',
                'hogar_id.exists' => 'El id del hogar no es valido',
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

        if ($validacion->fails())
        {
            return $validacion->getMessageBag();
        }

        return null;
    }

    public function getErrores(): array
    {
        return $this->errores;
    }

    public function getIntegrante(): Integrantes
    {
        return $this->integrante;
    }
}
