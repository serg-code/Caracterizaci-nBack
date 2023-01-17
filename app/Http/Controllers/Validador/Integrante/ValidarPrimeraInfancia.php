<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Http\Controllers\Controller;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarPrimeraInfancia extends Controller implements ValidacionEncuesta
{
    protected array $errores;
    protected int $puntaje;
    protected int $edad;
    protected int $mesesEdad;

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        $this->puntaje = 0;
        $this->errores = [];

        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->integrante->fecha_nacimiento);
        $fechaActual = Carbon::now();
        $diferenciaFechas = $fechaActual->diff($fechaNacimiento);
        $this->edad = $diferenciaFechas->y;
        $this->mesesEdad = $diferenciaFechas->format("%m");
    }

    public function validar()
    {

        // validar la edad del integrante 
        if ($this->edad < 0 || $this->edad > 5)
        {
            //Este integrante no es valido para serponser esta seccion
            $this->seccion = [];
            return false;
        }

        if (empty($this->seccion))
        {
            $this->errores = [
                'primera_infancia' => 'No encontramos la sección de Primera infancia, este integrante es válido para responder esta encuesta'
            ];
            return false;
        }

        $this->PesoNacer();
        $this->TallaNacer();

        $this->puntuacion('pi_valoracion_nutricional');
        $this->puntuacion('pi_desarrollo_lenguaje');
        $this->puntuacion('pi_desarrollo_motora');
        $this->puntuacion('pi_desarrollo_conducta');
        $this->puntuacion('pi_desarrollo_probelmas_visuales');
        $this->puntuacion('pi_desarrollo_problemas_auditivos');
        $this->puntuacion('pi_desparasitado');
        $this->puntuacion('pi_hospitalizacion_nacer');

        //validar el carnet de vacunacion
        $this->puntuacion('pi_carnet_vacunacion');
        $carnet = OpcionPregunta::opcionPregunta('pi_carnet_vacunacion', $this->seccion['pi_carnet_vacunacion']);
        if ($carnet->id === 422 || $carnet->pregunta_opcion == 'NO')
        {
            $this->eliminarVacunacion();
        }

        if ($carnet->id === 423 || $carnet->pregunta_opcion == 'SI')
        {
            $this->vacunacion();
        }

        $this->valoracionIntegral();
        $this->proteccionEspeficifica();
    }

    public function obtenerPreguntas(): array
    {
        return [
            'pi_peso_al_nacer',
            'pi_peso_actual',
            'pi_talla_al_nacer',
            'pi_talla_actual',
            'pi_valoracion_nutricional',
            'pi_desarrollo_lenguaje',
            'pi_desarrollo_motora',
            'pi_desarrollo_conducta',
            'pi_desarrollo_probelmas_visuales',
            'pi_desarrollo_problemas_auditivos',
            'pi_desparasitado',
            'pi_hospitalizacion_nacer',
            'pi_carnet_vacunacion',
            'pi_vacuna_bcg_rn',
            'pi_vacuna_polio_d1',
            'pi_vacuna_polio_d2',
            'pi_vacuna_polio_d3',
            'pi_vacuna_polio_r1',
            'pi_vacuna_polio_r2',
            'pi_vacuna_hepatitis',
            'pi_vacuna_hepatitis_b_rn',
            'pi_vacuna_influenza_estacional',
            'pi_vacuna_neumococo_d1',
            'pi_vacuna_neumococo_d2',
            'pi_vacuna_neumococo_d3',
            'pi_vacuna_rotavirus_d1',
            'pi_vacuna_rotavirus_d2',
            'pi_vacuna_fiebre_amarilla',
            'pi_vacuna_dpt_d1',
            'pi_vacuna_dpt_d2',
            'pi_vacuna_pentavalente_d1',
            'pi_vacuna_pentavalente_d2',
            'pi_vacuna_pentavalente_d3',
            'pi_vacuna_srp_d1',
            'pi_vacuna_srp_d2',
            'pi_vacuna_varicela',
            'pi_atencion_medica',
            'pi_atencion_enfermeria',
            'pi_atencion_lactancia',
            'pi_tsh',
            'pi_fluor',
            'pi_profilaxis',
            'pi_sellantes',
            'pi_higiene_bucal',
            'pi_caries',
            'pi_consulta_odontologica',
        ];
    }

    public function obtenerErrores(): array
    {
        return $this->errores;
    }

    public function obtenerPuntaje(): int
    {
        return $this->puntaje;
    }

    public function obtenerSeccion(): array
    {
        return $this->seccion;
    }

    protected function PesoNacer()
    {
        $pesoNacer = $this->seccion['pi_peso_al_nacer'] ?? null;

        if (empty($pesoNacer))
        {
            array_push($this->errores, ['pi_peso_al_nacer' => "No encontramos la pregunta (pi_peso_al_nacer)"]);
        }

        if ($pesoNacer > 2.8)
        {
            $this->puntaje += 1;
        }

        if ($pesoNacer > 4)
        {
            $this->puntaje += 5;
        }
    }

    protected function TallaNacer()
    {
        $tallaNacer = $this->seccion['pi_talla_al_nacer'] ?? null;

        if (empty($tallaNacer))
        {
            array_push($this->errores, ['pi_talla_al_nacer' => "No encontramos la pregunta (pi_talla_al_nacer)"]);
        }

        if ($tallaNacer < 40)
        {
            $this->puntaje += 5;
        }

        if ($tallaNacer > 55)
        {
            $this->puntaje += 5;
        }
    }

    protected function vacunacion()
    {
        $this->puntuacion('pi_vacuna_bcg_rn');
        $this->puntuacion('pi_vacuna_hepatitis_b_rn');

        if ($this->mesesEdad <= 3)
        {
            $this->puntuacion('pi_vacuna_polio_d1');
        }

        if ($this->mesesEdad >= 4 && $this->mesesEdad <= 5)
        {
            $this->puntuacion('pi_vacuna_polio_d2');
        }

        if ($this->mesesEdad >= 6 && $this->mesesEdad <= 17)
        {
            $this->puntuacion('pi_vacuna_polio_d3');
        }

        if ($this->mesesEdad >= 18 && $this->edad < 5)
        {
            $this->puntuacion('pi_vacuna_polio_r1');
        }

        if ($this->mesesEdad == 2)
        {
            $this->puntuacion('pi_vacuna_neumococo_d1');
            $this->puntuacion('pi_vacuna_rotavirus_d1');
            $this->puntuacion('pi_vacuna_pentavalente_d1');
        }

        if ($this->mesesEdad == 4)
        {
            $this->puntuacion('pi_vacuna_neumococo_d2');
            $this->puntuacion('pi_vacuna_rotavirus_d2');
            $this->puntuacion('pi_vacuna_pentavalente_d2');
        }

        if ($this->mesesEdad == 6)
        {
            $this->puntuacion('pi_vacuna_influenza_estacional');
            $this->puntuacion('pi_vacuna_pentavalente_d3');
        }

        if ($this->mesesEdad == 12 | $this->edad == 1)
        {
            $this->puntuacion('pi_vacuna_hepatitis_a');
            $this->puntuacion('pi_vacuna_neumococo_d3');
            $this->puntuacion('pi_vacuna_srp_d1');
            $this->puntuacion('pi_vacuna_varicela');
        }

        if ($this->mesesEdad == 18)
        {
            $this->puntuacion('pi_vacuna_fiebre_amarilla');
            $this->puntuacion('pi_vacuna_dpt_d1');
        }

        if ($this->edad == 5)
        {
            $this->puntuacion('pi_vacuna_polio_r2');
            $this->puntuacion('pi_vacuna_srp_d2');
            $this->puntuacion('pi_vacuna_dpt_d2');
        }
    }

    protected function valoracionIntegral()
    {
        $this->validacionSimple('pi_atencion_medica', $this->rangosAtencionMedica());
        $this->validacionSimple('pi_atencion_enfermeria', $this->rangosAtencionEnfermeria());
        $this->validacionSimple('pi_atencion_lactancia', ($this->mesesEdad >= 1 && $this->mesesEdad <= 6));
        $this->puntuacion('pi_tsh');
    }

    protected function rangosAtencionMedica(): bool
    {
        $mesesEdad = $this->mesesEdad;
        $edad = $this->edad;

        return ($mesesEdad == 1) || ($mesesEdad >= 4 && $mesesEdad <= 5) ||
            ($mesesEdad >= 12 && $mesesEdad <= 18) || ($mesesEdad >= 24 && $mesesEdad >= 29) ||
            ($edad == 3) || ($edad == 4);
    }

    protected function rangosAtencionEnfermeria(): bool
    {
        $mesesEdad = $this->mesesEdad;
        $edad = $this->edad;

        return ($mesesEdad >= 2 && $mesesEdad <= 3) || ($mesesEdad >= 6 && $mesesEdad <= 8) ||
            ($mesesEdad >= 9 && $mesesEdad <= 11) || ($mesesEdad >= 19 && $mesesEdad <= 23) ||
            ($mesesEdad >= 30 && $mesesEdad <= 35) || ($edad == 4);
    }

    protected function validacionSimple(string $refCampo, bool $validar)
    {
        if ($validar)
        {
            $this->puntuacion($refCampo);
        }
        else
        {
            unset($this->seccion[$refCampo]);
        }
    }

    protected function proteccionEspeficifica()
    {
        $meses = $this->mesesEdad;
        $edad = $this->edad;

        if ($edad >= 1 && $edad <= 5)
        {
            $this->puntuacion('pi_fluor');
            $this->puntuacion('pi_profilaxis');
        }
        else
        {
            unset(
                $this->seccion['pi_fluor'],
                $this->seccion['pi_profilaxis'],
            );
        }

        if ($meses > 6)
        {
            $this->puntuacion('pi_consulta_odontologica');
        }
        else
        {
            unset(
                $this->seccion['pi_consulta_odontologica']
            );
        }
    }

    protected function puntuacion(string $refCampo)
    {
        $respuestaEncuesta = $this->seccion[$refCampo] ?? null;
        if (empty($respuestaEncuesta))
        {
            array_push($this->errores, [$refCampo => 'No encontramos la pregunta ' . $refCampo]);
            return false;
        }

        $opcion = OpcionPregunta::opcionPregunta($refCampo, $respuestaEncuesta);
        if (empty($opcion))
        {
            array_push($this->errores, [
                $refCampo => $respuestaEncuesta . " no es un respuesta valida para $refCampo"
            ]);
            return false;
        }

        $this->puntaje += $opcion->valor;
    }

    protected function eliminarVacunacion()
    {
        unset(
            $this->seccion['pi_vacuna_bcg_rn'],
            $this->seccion['pi_vacuna_hepatitis_b_rn'],
            $this->seccion['pi_vacuna_polio_d1'],
            $this->seccion['pi_vacuna_polio_d2'],
            $this->seccion['pi_vacuna_polio_d3'],
            $this->seccion['pi_vacuna_polio_r1'],
            $this->seccion['pi_vacuna_neumococo_d1'],
            $this->seccion['pi_vacuna_rotavirus_d1'],
            $this->seccion['pi_vacuna_pentavalente_d1'],
            $this->seccion['pi_vacuna_neumococo_d2'],
            $this->seccion['pi_vacuna_rotavirus_d2'],
            $this->seccion['pi_vacuna_pentavalente_d2'],
            $this->seccion['pi_vacuna_influenza_estacional'],
            $this->seccion['pi_vacuna_pentavalente_d3'],
            $this->seccion['pi_vacuna_hepatitis_a'],
            $this->seccion['pi_vacuna_neumococo_d3'],
            $this->seccion['pi_vacuna_varicela'],
            $this->seccion['pi_vacuna_fiebre_amarilla'],
            $this->seccion['pi_vacuna_dpt_d1'],
            $this->seccion['pi_vacuna_polio_r2'],
            $this->seccion['pi_vacuna_srp_d2'],
            $this->seccion['pi_vacuna_dpt_d2'],
        );
    }
}
