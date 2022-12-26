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
Schema::create('primera_infancia', function (Blueprint $table) {
$table->uuid('id_integrante')->unique();
$table->string('pi_peso_al_nacer')->nullable();
$table->string('pi_peso_actual')->nullable();
$table->string('pi_talla_al_nacer')->nullable();
$table->string('pi_talla_actual')->nullable();
$table->enum('pi_valoracion_nutricional', [
    'Verde',
    'Amarillo',
    'Rojo',
]);
$table->string('pi_valoracion_nutricional_amarillo')->nullable();
$table->string('pi_valoracion_nutricional_rojo')->nullable();
$table->string('pi_desarrollo_lenguaje')->nullable();
$table->string('pi_desarrollo_motora')->nullable();
$table->string('pi_desarrollo_conducta')->nullable();
$table->string('pi_desarrollo_probelmas_visuales')->nullable();
$table->string('pi_desarrollo_problemas_auditivos')->nullable();
$table->string('pi_desparasitado')->nullable();
$table->string('pi_hospitalizacion_nacer')->nullable();
$table->string('pi_carnet_vacunacion')->nullable();
$table->string('pi_vacuna_bcg_rn')->nullable();
$table->string('pi_vacuna_polio_d1_2_a_3_mes')->nullable();
$table->string('pi_vacuna_polio_d2_4_a_5_mes')->nullable();
$table->string('pi_vacuna_polio_d3_6_a_17_mes')->nullable();
$table->string('pi_vacuna_polio_r1_18_mes')->nullable();
$table->string('pi_vacuna_polio_r2_5_años')->nullable();
$table->string('pi_vacuna_hepatitis_a_12_mes')->nullable();
$table->string('pi_vacuna_hepatitis_b_rn')->nullable();
$table->string('pi_vacuna_influenza_estacional_6_mes')->nullable();
$table->string('pi_vacuna_neumococo_d1_2_mes')->nullable();
$table->string('pi_vacuna_neumococo_d2_4_mes')->nullable();
$table->string('pi_vacuna_neumococo_d3_12_mes')->nullable();
$table->string('pi_vacuna_rotavirus_d1_2_mes')->nullable();
$table->string('pi_vacuna_rotavirus_d2_4_mes')->nullable();
$table->string('pi_vacuna_fiebre_amarilla_18_mes')->nullable();
$table->string('pi_vacuna_dpt_d1_18_mes')->nullable();
$table->string('pi_vacuna_dpt_d2_5_anios')->nullable();
$table->string('pi_vacuna_pentavalente_d1_2_mes')->nullable();
$table->string('pi_vacuna_pentavalente_d2_4_mes')->nullable();
$table->string('pi_vacuna_pentavalente_d3_6_mes')->nullable();
$table->string('pi_vacuna_srp_d1_12_mes')->nullable();
$table->string('pi_vacuna_srp_d2_5_anios')->nullable();
$table->string('pi__vacuna_varicela_12_mes')->nullable();
$table->string('pi_atencion_medica_1_mes')->nullable();
$table->string('pi_atencion_medica_4_a_5_mes')->nullable();
$table->string('pi_atencion_medica_12_a_18_mes')->nullable();
$table->string('pi_atencion_medica_24_a_29_mes')->nullable();
$table->string('pi_atencion_medica_3_anios')->nullable();
$table->string('pi_atencion_medica_4_anios')->nullable();
$table->string('pi_atencion_enfermeria_2_a_3_mes')->nullable();
$table->string('pi_atencion_enfermeria_6_a_8_mes')->nullable();
$table->string('pi_atencion_enfermeria_9_a_11_mes')->nullable();
$table->string('pi_atencion_enfermeria_19_a_23_mes')->nullable();
$table->string('pi_atencion_enfermeria_30_a_35_mes')->nullable();
$table->string('pi_atencion_enfermeria_4_anios')->nullable();
$table->string('pi_atencion_lactancia_1_a_6_mes')->nullable();
$table->string('pi_tsh')->nullable();
$table->string('pi_fluor_1_a_5_anios')->nullable();
$table->string('pi_profilaxis_1_a_5_anios')->nullable();
$table->string('pi_sellantes_3_anios')->nullable();
$table->string('pi_higiene_bucal')->nullable();
$table->string('pi_caries')->nullable();
$table->string('pi_consulta_odontologica_6_mes_a_5_anios')->nullable();
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
        Schema::dropIfExists('primera_infancia');
    }
};
