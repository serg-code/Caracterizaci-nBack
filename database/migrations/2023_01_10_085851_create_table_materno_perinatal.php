<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_materno_perinatal', function (Blueprint $table) {
            $table->uuid('id_integrante')->unique();
            $table->string('ma_aceptacion_embarazo')->nullable();
        $table->string('ma_fecha_control_prenatal')->nullable();
        $table->string('ma_fecha_ultima_regla')->nullable();
        $table->string('ma_fecha_parto')->nullable();
        $table->string('ma_ganancia_peso')->nullable();
        $table->string('ma_gestacion')->nullable();
        $table->string('ma_carnet')->nullable();
        $table->string('ma_prenatal_mensual')->nullable();
        $table->string('ma_examen_serologia_1_trimestre')->nullable();
        $table->string('ma_examen_serologia_2_trimestre')->nullable();
        $table->string('ma_examen_serologia_3_trimestre')->nullable();
        $table->string('ma_examen_vih_1_trimestre')->nullable();
        $table->string('ma_examen_vih_2_trimestre')->nullable();
        $table->string('ma_examen_vih_3_trimestre')->nullable();
        $table->string('ma_odontologico')->nullable();
        $table->string('ma_suplementacion')->nullable();
        $table->string('ma_sedentarismo')->nullable();
        $table->string('ma_bebidas_alcoholicas')->nullable();
        $table->string('ma_fecha_ultimo_parto')->nullable();
        $table->string('ma_depresion_postparto')->nullable();
        $table->string('ma_atencion_institucional')->nullable();
        $table->string('ma_aborto_no_especificado')->nullable();
        $table->string('ma_hemorragia_precoz')->nullable();
        $table->string('ma_hemorragia_anteparto')->nullable();
        $table->string('ma_hipertension')->nullable();
        $table->string('ma_vomitos')->nullable();
        $table->string('ma_atencion_madre')->nullable();
        $table->string('ma_diabetes_mellitus')->nullable();
        $table->string('ma_hallazgo_anormal')->nullable();
        $table->string('ma_parto_unico')->nullable();
        $table->string('ma_parto-complicado')->nullable();
        $table->string('ma_hemorragia_postparto')->nullable();
        $table->string('ma_parto_cesarea')->nullable();
        $table->string('ma_otras_complicaciones_parto')->nullable();
        $table->string('ma_otras_complicaciones_purperio')->nullable();
        $table->string('ma_hospitalizacion_sifilis')->nullable();
        $table->string('ma_edad_gestacional')->nullable();
        $table->string('ma_plan_canguro')->nullable();
        $table->string('ma_curso_maternidad_paternidad')->nullable();
        $table->string('ma_atencion_medica')->nullable();
        $table->string('ma_atencion_enfermeria')->nullable();
        $table->string('ma_atencion_odontologica')->nullable();
        $table->string('ma_antigeno_hepatitis_b')->nullable();
        $table->string('ma_cancer_cuello_uterino')->nullable();
        $table->string('ma_glicemia_ayuna')->nullable();
        $table->string('ma_hemoclasificacion')->nullable();
        $table->string('ma_hemograma')->nullable();
        $table->string('ma_hemoparasitos_chagas')->nullable();
        $table->string('ma_toxoplasma')->nullable();
        $table->string('ma_rubeola')->nullable();
        $table->string('ma_varicela')->nullable();
        $table->string('ma_prueba_treponemica_sifilis')->nullable();
        $table->string('ma_urocultivo')->nullable();
        $table->string('ma_prueba_vih')->nullable();
        $table->string('ma_espermograma')->nullable();
        $table->string('ma_citologia')->nullable();
        $table->string('ma_elisa')->nullable();
        $table->string('ma_micronutrientes')->nullable();
        $table->string('ma_atencion_prenatal_medica_general')->nullable();
        $table->string('ma_atencion_prenatal_enfermeria')->nullable();
        $table->string('ma_atencion_prenatal_medica_obstetra')->nullable();
        $table->string('ma_atencion_prenatal_consulta_nutricion')->nullable();
        $table->string('ma_vacunacion_toxoide')->nullable();
        $table->string('ma_vacunacion_difteria')->nullable();
        $table->string('ma_vacunacion_tosferina')->nullable();
        $table->string('ma_vacunacion_influenza')->nullable();
        $table->string('ma_ecografia_obstetrica')->nullable();
        $table->string('ma_ecografia_anatomico')->nullable();
        $table->string('ma_interrupcion_voluntaria_embarazo')->nullable();
        $table->string('ma_asesoria_anticonceptiva_ive')->nullable();
        $table->string('ma_atencion_purperio')->nullable();
        $table->string('ma_atencion_pediatria')->nullable();
        $table->string('ma_atencion_recien_nacido')->nullable();
        $table->string('ma_hemograma_recien_nacido')->nullable();
        $table->string('ma_hemoclasificacion_recien_nacido')->nullable();
        $table->string('ma_sifilis_recien_nacido')->nullable();
        $table->string('ma_vih_recien_nacido')->nullable();
        $table->string('ma_chagas_recien_nacido')->nullable();
        $table->string('ma_tsh_recien_nacido')->nullable();
        $table->string('ma_tamizaje_genetico_recien_nacido')->nullable();
            $table->timestamps();

            $table->foreign('id_integrante')->references('id')->on('integrantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_materno_perinatal');
    }
};
