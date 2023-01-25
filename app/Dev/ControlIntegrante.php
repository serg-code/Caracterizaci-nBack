<?php

namespace App\Dev;

use App\Dev\Encuesta\SeccionesIntegrante;
use App\Models\Hogar\Hogar;
use App\Models\Integrantes;
use App\Models\Pregunta;
use App\Models\respuestas\RespuestaIntegrante;
use Illuminate\Support\Carbon;
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
        $this->integrante = $integrante;
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

    public function actualizarIntegrante(bool $retorno = true)
    {
        $this->integrante = Integrantes::actualizarIntegrante($this->datosIntegrante);

        $secciones = $this->datosIntegrante['secciones'];
        $integrante = $this->recorrecSecciones($secciones);

        $this->actulizarEncuestaHogar($integrante->hogar_id);

        if ($retorno)
        {
            return RespuestaHttp::respuesta(
                200,
                'succes',
                'Integrante actualizado',
                [
                    'integrante' => $integrante,
                ]
            );
        }
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

    public function validarCrearIntegrante(array $datosIntegrante): array|MessageBag
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
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'max:10',
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
                'correo.email' => 'El formato de correo no es valido',
                'fecha_nacimiento.required' => 'La fecha de nacimiento es necesaria',
                'fecha_nacimiento.date' => 'La fecha de nacimiento no cumple con el formato necesario',
                'telefono.max' => ' Este número de teléfono es muy largo, por favor revíselo',
            ]
        );

        if ($validacion->fails())
        {
            return $validacion->getMessageBag();
        }

        //* validar edad y tipo de documento
        $fechaNacimiento = $datosIntegrante['fecha_nacimiento'];
        $documento = $datosIntegrante['tipo_identificacion'];

        $errorEdad = $this->validarEdadDocumento($fechaNacimiento, $documento);

        return array_merge($errorEdad, []);
    }


    public function guardadoFinal(array $respuestas)
    {
        foreach ($respuestas as $refCampo => $respuestaFormulario)
        {
            $pregunta = Pregunta::where('ref_campo', '=', $refCampo)->first();

            $respuesta = new RespuestaIntegrante([
                'id_integrante' => $this->integrante->id,
                'ref_campo' => $refCampo,
                'pregunta' => $pregunta->descripcion,
                'respuesta' => $respuestaFormulario,
                // 'puntaje' => ?,
            ]);
            $respuesta->save();
        }
    }

    public function getErrores(): array
    {
        return $this->errores;
    }

    public function getIntegrante(): ?Integrantes
    {
        return $this->integrante;
    }

    protected function validarEdadDocumento(string $fechaNacimiento, string $tipoDocumento): array
    {
        $edad = Carbon::createFromFormat('Y-m-d', $fechaNacimiento)->age;
        $errores = [];

        if ($edad < 18 && $tipoDocumento === 'CC')
        {
            $errores['edad'] = [
                'La persona no cuenta con la edad suficiente para contar con cedula de ciudadania',
            ];
        }

        if ($edad >= 18 && $tipoDocumento === 'TI')
        {
            $errores['tipo_documento'] = [
                "La persona cuenta con $edad años de edad, no es valido que utilice Targeta de identidad como tipo de documento"
            ];
        }

        return $errores;
    }
}
