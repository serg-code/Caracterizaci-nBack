<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Dev\Encuesta\OpcionPregunta;
use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use App\Models\Opcion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ValidarMaternoPerinatal implements ValidacionEncuesta
{

    protected array $errores;
    protected int $puntaje;
    protected int $edad;
    protected int $mesesEdad;
    protected array $seccionValidada;

    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        $this->puntaje = 0;
        $this->errores = [];
        $this->seccionValidada = [];

        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->integrante->fecha_nacimiento);
        $fechaActual = Carbon::now();
        $diferenciaFechas = $fechaActual->diff($fechaNacimiento);
        $this->edad = $diferenciaFechas->y;
        $this->mesesEdad = $diferenciaFechas->format("%m");
    }

    public function validar()
    {
        if ($this->integrante->sexo != 'Femenino')
        {
            array_push($this->seccionValidada, ['materno_perinatal' => 'No puede responder a esta seccion']);
            return false;
        }

        $aceptarEmbarazo = $this->puntuacion('ma_aceptacion_embarazo');
        if ($aceptarEmbarazo->id == 829)
        {
            return false;
        }

        $this->puntuacion('ma_fecha_control_prenatal');
        $this->puntuacion('ma_fecha_ultima_regla');
        $this->puntuacion('ma_fecha_parto');
        $this->puntuacion('ma_ganancia_peso');
        $this->puntuacion('ma_gestacion');
        $this->puntuacion('ma_carnet');
        $this->puntuacion('ma_prenatal_mensual');
        $this->examen();
    }

    public function obtenerErrores(): array
    {
        return $this->errores;
    }

    public function obtenerPuntaje(): int
    {
        return $this->puntaje;
    }

    public function obtenerPreguntas(): array
    {
        return [
            'ma_aceptacion_embarazo',
            'ma_fecha_control_prenatal',
            'ma_fecha_ultima_regla',
            'ma_fecha_parto',
            'ma_ganancia_peso',
            'ma_gestacion',
            'ma_carnet',
            'ma_prenatal_mensual',
            'ma_examen_serologia_1_trimestre',
            'ma_examen_serologia_2_trimestre',
            'ma_examen_serologia_3_trimestre',
            'ma_examen_vih_1_trimestre',
            'ma_examen_vih_2_trimestre',
            'ma_examen_vih_3_trimestre',
            'ma_odontologico',
            'ma_suplementacion',
            'ma_sedentarismo',
            'ma_bebidas_alcoholicas',
            'ma_fecha_ultimo_parto',
            'ma_depresion_postparto',
            'ma_atencion_institucional',
            'ma_aborto_no_especificado',
            'ma_hemorragia_precoz',
            'ma_hemorragia_anteparto',
            'ma_hipertension',
            'ma_vomitos',
            'ma_atencion_madre',
            'ma_diabetes_mellitus',
            'ma_hallazgo_anormal',
            'ma_parto_unico',
            'ma_parto_complicado',
            'ma_hemorragia_postparto',
            'ma_parto_cesarea',
            'ma_otras_complicaciones_parto',
            'ma_otras_complicaciones_purperio',
            'ma_hospitalizacion_sifilis',
            'ma_edad_gestacional',
            'ma_plan_canguro',
            'ma_curso_maternidad_paternidad',
            'ma_atencion_medica',
            'ma_atencion_enfermeria',
            'ma_atencion_odontologica',
            'ma_antigeno_hepatitis_b',
            'ma_cancer_cuello_uterino',
            'ma_glicemia_ayuna',
            'ma_hemoclasificacion',
            'ma_hemograma',
            'ma_hemoparasitos_chagas',
            'ma_toxoplasma',
            'ma_rubeola',
            'ma_varicela',
            'ma_prueba_treponemica_sifilis',
            'ma_urocultivo',
            'ma_prueba_vih',
            'ma_espermograma',
            'ma_citologia',
            'ma_elisa',
            'ma_micronutrientes',
            'ma_atencion_prenatal_medica_general',
            'ma_atencion_prenatal_enfermeria',
            'ma_atencion_prenatal_medica_obstetra',
            'ma_atencion_prenatal_consulta_nutricion',
            'ma_vacunacion_toxoide',
            'ma_vacunacion_difteria',
            'ma_vacunacion_tosferina',
            'ma_vacunacion_influenza',
            'ma_ecografia_obstetrica',
            'ma_ecografia_anatomico',
            'ma_interrupcion_voluntaria_embarazo',
            'ma_asesoria_anticonceptiva_ive',
            'ma_atencion_purperio',
            'ma_atencion_pediatria',
            'ma_atencion_recien_nacido',
            'ma_hemograma_recien_nacido',
            'ma_hemoclasificacion_recien_nacido',
            'ma_sifilis_recien_nacido',
            'ma_vih_recien_nacido',
            'ma_chagas_recien_nacido',
            'ma_tsh_recien_nacido',
            'ma_tamizaje_genetico_recien_nacido',
        ];
    }

    public function obtenerSeccion(): array
    {
        return $this->seccionValidada;
    }

    protected function puntuacion(string $refCampo): Opcion
    {
        $respuestaEncuesta = $this->seccion[$refCampo] ?? null;
        if (empty($respuestaEncuesta))
        {
            array_push($this->errores, [$refCampo => 'No encontramos la pregunta ' . $refCampo]);
            return new Opcion(['id' => 0, 'valor' => 0]);
        }

        $opcion = OpcionPregunta::opcionPregunta($refCampo, $respuestaEncuesta);
        if (empty($opcion))
        {
            array_push($this->errores, [
                $refCampo => $respuestaEncuesta . " no es un respuesta valida para $refCampo"
            ]);
            return new Opcion(['id' => 0, 'valor' => 0]);
        }

        array_push($this->seccionValidada, [$refCampo => $this->seccion[$refCampo]]);
        $this->puntaje += $opcion->valor;
        return $opcion;
    }

    protected function validacionSimple(string $refCampo, bool $validar): ?Opcion
    {
        if ($validar)
        {
            return $this->puntuacion($refCampo);
        }

        return null;
    }

    protected function examen()
    {
        $this->puntuacion('ma_examen_serologia_1_trimestre');
        $this->puntuacion('ma_examen_serologia_2_trimestre');
        $this->puntuacion('ma_examen_serologia_3_trimestre');
        $this->puntuacion('ma_examen_vih_1_trimestre');
        $this->puntuacion('ma_examen_vih_2_trimestre');
        $this->puntuacion('ma_examen_vih_3_trimestre');
        $this->puntuacion('ma_odontologico');
        $this->puntuacion('ma_suplementacion');
        $this->puntuacion('ma_sedentarismo');
        $this->puntuacion('ma_bebidas_alcoholicas');

        $this->ultimoParto();

        $this->puntuacion('ma_depresion_postparto');
        $this->puntuacion('ma_atencion_institucional');
    }

    protected function ultimoParto()
    {
        $ultimoParto = $this->seccion['ma_fecha_ultimo_parto'] ?? null;

        if (!empty($fechaUltimoParto))
        {
            $fechaUltimoParto = Carbon::createFromFormat('Y-m-d', $fechaUltimoParto);
            $fechaActual = Carbon::now();
            $diferenciaFechas = $fechaActual->diff($fechaUltimoParto);
            $mesesParto = $diferenciaFechas->format("%m");

            if ($mesesParto < 12)
            {
                $this->puntaje += 5;
            }
        }
    }
}
