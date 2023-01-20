<?php

namespace App\Http\Controllers\Validador\Integrante;

use App\Interfaces\ValidacionEncuesta;
use App\Models\Integrantes;
use Illuminate\Support\Carbon;

class ValidarMaternoPerinatal extends ValidacionIntegrante implements ValidacionEncuesta
{
    public function __construct(
        protected Integrantes $integrante = new Integrantes(),
        protected array $seccion = [],
    )
    {
        parent::__construct('materno_perinatal', $integrante, $seccion);
    }

    public function validar()
    {
        if (empty($this->seccion))
        {
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
        $this->gestacion();
        $this->puntuacion('ma_carnet');
        $this->puntuacion('ma_prenatal_mensual');
        $this->examen();
    }

    protected function gestacion()
    {
        $gestacion = $this->seccion['ma_gestacion'];

        if (empty($gestacion) && $gestacion != 0)
        {
            return false;
        }

        if ($gestacion < 0)
        {
            $this->agregarErrror('ma_gestacion', "($gestacion) No es un valor valido para ma_gestacion");
        }

        if ($gestacion >= 12)
        {
            $this->puntuacion('ma_examen_serologia_1_trimestre');
            $this->puntuacion('ma_examen_vih_1_trimestre');
        }

        if ($gestacion >= 24)
        {
            $this->puntuacion('ma_examen_serologia_2_trimestre');
            $this->puntuacion('ma_examen_vih_2_trimestre');
        }

        if ($gestacion >= 36)
        {
            $this->puntuacion('ma_examen_serologia_3_trimestre');
            $this->puntuacion('ma_examen_vih_3_trimestre');
        }
    }

    protected function examen()
    {

        $this->puntuacion('ma_odontologico');
        $this->puntuacion('ma_suplementacion');
        $this->puntuacion('ma_sedentarismo');
        $this->puntuacion('ma_bebidas_alcoholicas');

        $this->ultimoParto();

        $this->puntuacion('ma_depresion_postparto');
        $this->puntuacion('ma_atencion_institucional');

        $this->morbilidad();
        $this->valoracionIntegral();
        $this->deteccionTemprana();
        $this->proteccionEspecifica();
    }

    protected function ultimoParto()
    {
        $fechaUltimoParto = $this->seccion['ma_fecha_ultimo_parto'] ?? null;

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

    protected function morbilidad()
    {
        $this->puntuacion('ma_aborto_no_especificado');
        $this->puntuacion('ma_hemorragia_precoz');
        $this->puntuacion('ma_hemorragia_anteparto');
        $this->puntuacion('ma_hipertension');
        $this->puntuacion('ma_vomitos');
        $this->puntuacion('ma_atencion_madre');
        $this->puntuacion('ma_diabetes_mellitus');
        $this->puntuacion('ma_hallazgo_anormal');
        $this->puntuacion('ma_parto_unico');
        $this->puntuacion('ma_parto_complicado');
        $this->puntuacion('ma_hemorragia_postparto');
        $this->puntuacion('ma_parto_cesarea');
        $this->puntuacion('ma_otras_complicaciones_parto');
        $this->puntuacion('ma_otras_complicaciones_purperio');
        $this->puntuacion('ma_hospitalizacion_sifilis');
        $this->edadGEstacion();
        $this->puntuacion('ma_plan_canguro');
        $this->puntuacion('ma_curso_maternidad_paternidad');
    }

    protected function edadGEstacion()
    {
        $edadGestacion = $this->seccion['ma_edad_gestacional'] ?? null;
        if (empty($edadGestacion))
        {
            return false;
        }

        if ($edadGestacion < 38)
        {
            $this->sumarPuntaje(5);
        }

        return true;
    }

    protected function valoracionIntegral()
    {
        if ($this->integrante->sexo != 'Femenino' || $this->edad < 15 || $this->edad > 49)
        {
            return false;
        }

        //examen 1 vez al año
        $this->puntuacion('ma_atencion_medica');
        $this->puntuacion('ma_atencion_enfermeria');
        $this->puntuacion('ma_atencion_odontologica');
    }

    protected function deteccionTemprana()
    {
        if ($this->edad >= 15 && $this->edad <= 49)
        {
            $this->puntuacion('ma_antigeno_hepatitis_b');
            $this->puntuacion('ma_cancer_cuello_uterino');
            $this->puntuacion('ma_glicemia_ayuna');
            $this->puntuacion('ma_hemoclasificacion');
            $this->puntuacion('ma_hemograma');
            //$this->puntuacion('ma_hemoparasitos_chagas');
            $this->puntuacion('ma_toxoplasma');
            $this->puntuacion('ma_rubeola');
            $this->puntuacion('ma_varicela');
            $this->puntuacion('ma_prueba_treponemica_sifilis');
            $this->puntuacion('ma_urocultivo');
            $this->puntuacion('ma_prueba_vih');
            $this->puntuacion('ma_espermograma');
            $this->puntuacion('ma_citologia');
            $this->puntuacion('ma_elisa');
            $this->puntuacion('ma_micronutrientes');
            $this->prenatal();
            $this->puntuacion('ma_vacunacion_toxoide');
            $this->puntuacion('ma_vacunacion_difteria');
            $this->puntuacion('ma_vacunacion_tosferina');
            $this->puntuacion('ma_vacunacion_influenza');
            $this->puntuacion('ma_ecografia_obstetrica');
            $this->puntuacion('ma_ecografia_anatomico');
        }
    }

    protected function prenatal()
    {
        $this->puntuacion('ma_atencion_prenatal_medica_general');
        $this->puntuacion('ma_atencion_prenatal_enfermeria');
        $this->puntuacion('ma_atencion_prenatal_medica_obstetra');
        $this->puntuacion('ma_atencion_prenatal_consulta_nutricion');
    }

    protected function proteccionEspecifica()
    {
        if ($this->edad >= 15 && $this->edad <= 49)
        {
            $this->puntuacion('ma_interrupcion_voluntaria_embarazo');
            $this->puntuacion('ma_asesoria_anticonceptiva_ive');
            $this->puntuacion('ma_atencion_purperio');
            $this->puntuacion('ma_atencion_pediatria');
            $this->puntuacion('ma_atencion_recien_nacido');
            $this->puntuacion('ma_hemograma_recien_nacido');
            $this->puntuacion('ma_hemoclasificacion_recien_nacido');
            $this->puntuacion('ma_sifilis_recien_nacido');
            $this->puntuacion('ma_vih_recien_nacido');
            $this->puntuacion('ma_tsh_recien_nacido');
            $this->puntuacion('ma_tamizaje_genetico_recien_nacido');
        }

        //examen si tiene chagas positivo
        $chagas = $this->puntuacion('ma_hemoparasitos_chagas');

        $this->validacionSimple('ma_chagas_recien_nacido', ($chagas->id == 923));
    }
}
