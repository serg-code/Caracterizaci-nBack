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
        Schema::create('materno_perinatal', function (Blueprint $table)
        {
            $table->uuid('id_integrante')->unique();
            $table->text('ma_aceptacion_embarazo')->nullable();
            $table->text('ma_fecha_control_prenatal')->nullable();
            $table->text('ma_fecha_ultima_regla')->nullable();
            $table->text('ma_fecha_parto')->nullable();
            $table->text('ma_ganancia_peso')->nullable();
            $table->text('ma_gestacion')->nullable();
            $table->text('ma_carnet')->nullable();
            $table->text('ma_prenatal_mensual')->nullable();
            $table->text('ma_examen_serologia_1_trimestre')->nullable();
            $table->text('ma_examen_serologia_2_trimestre')->nullable();
            $table->text('ma_examen_serologia_3_trimestre')->nullable();
            $table->text('ma_examen_vih_1_trimestre')->nullable();
            $table->text('ma_examen_vih_2_trimestre')->nullable();
            $table->text('ma_examen_vih_3_trimestre')->nullable();
            $table->text('ma_odontologico')->nullable();
            $table->text('ma_suplementacion')->nullable();
            $table->text('ma_sedentarismo')->nullable();
            $table->text('ma_bebidas_alcoholicas')->nullable();
            $table->text('ma_fecha_ultimo_parto')->nullable();
            $table->text('ma_depresion_postparto')->nullable();
            $table->text('ma_atencion_institucional')->nullable();
            $table->text('ma_aborto_no_especificado')->nullable();
            $table->text('ma_hemorragia_precoz')->nullable();
            $table->text('ma_hemorragia_anteparto')->nullable();
            $table->text('ma_hipertension')->nullable();
            $table->text('ma_vomitos')->nullable();
            $table->text('ma_atencion_madre')->nullable();
            $table->text('ma_diabetes_mellitus')->nullable();
            $table->text('ma_hallazgo_anormal')->nullable();
            $table->text('ma_parto_unico')->nullable();
            $table->text('ma_parto_complicado')->nullable();
            $table->text('ma_hemorragia_postparto')->nullable();
            $table->text('ma_parto_cesarea')->nullable();
            $table->text('ma_otras_complicaciones_parto')->nullable();
            $table->text('ma_otras_complicaciones_purperio')->nullable();
            $table->text('ma_hospitalizacion_sifilis')->nullable();
            $table->text('ma_edad_gestacional')->nullable();
            $table->text('ma_plan_canguro')->nullable();
            $table->text('ma_curso_maternidad_paternidad')->nullable();
            $table->text('ma_atencion_medica')->nullable();
            $table->text('ma_atencion_enfermeria')->nullable();
            $table->text('ma_atencion_odontologica')->nullable();
            $table->text('ma_antigeno_hepatitis_b')->nullable();
            $table->text('ma_cancer_cuello_uterino')->nullable();
            $table->text('ma_glicemia_ayuna')->nullable();
            $table->text('ma_hemoclasificacion')->nullable();
            $table->text('ma_hemograma')->nullable();
            $table->text('ma_hemoparasitos_chagas')->nullable();
            $table->text('ma_toxoplasma')->nullable();
            $table->text('ma_rubeola')->nullable();
            $table->text('ma_varicela')->nullable();
            $table->text('ma_prueba_treponemica_sifilis')->nullable();
            $table->text('ma_urocultivo')->nullable();
            $table->text('ma_prueba_vih')->nullable();
            $table->text('ma_espermograma')->nullable();
            $table->text('ma_citologia')->nullable();
            $table->text('ma_elisa')->nullable();
            $table->text('ma_micronutrientes')->nullable();
            $table->text('ma_atencion_prenatal_medica_general')->nullable();
            $table->text('ma_atencion_prenatal_enfermeria')->nullable();
            $table->text('ma_atencion_prenatal_medica_obstetra')->nullable();
            $table->text('ma_atencion_prenatal_consulta_nutricion')->nullable();
            $table->text('ma_vacunacion_toxoide')->nullable();
            $table->text('ma_vacunacion_difteria')->nullable();
            $table->text('ma_vacunacion_tosferina')->nullable();
            $table->text('ma_vacunacion_influenza')->nullable();
            $table->text('ma_ecografia_obstetrica')->nullable();
            $table->text('ma_ecografia_anatomico')->nullable();
            $table->text('ma_interrupcion_voluntaria_embarazo')->nullable();
            $table->text('ma_asesoria_anticonceptiva_ive')->nullable();
            $table->text('ma_atencion_purperio')->nullable();
            $table->text('ma_atencion_pediatria')->nullable();
            $table->text('ma_atencion_recien_nacido')->nullable();
            $table->text('ma_hemograma_recien_nacido')->nullable();
            $table->text('ma_hemoclasificacion_recien_nacido')->nullable();
            $table->text('ma_sifilis_recien_nacido')->nullable();
            $table->text('ma_vih_recien_nacido')->nullable();
            $table->text('ma_chagas_recien_nacido')->nullable();
            $table->text('ma_tsh_recien_nacido')->nullable();
            $table->text('ma_tamizaje_genetico_recien_nacido')->nullable();
            $table->timestamps();

            $table->foreign('id_integrante')->references('id')->on('integrantes')->onDelete('cascade');
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
