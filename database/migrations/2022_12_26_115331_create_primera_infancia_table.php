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
$table->string('pi_desarrollo_lenguaje')->nullable();
$table->string('pi_desarrollo_motora')->nullable();
$table->string('pi_desarrollo_conducta')->nullable();
$table->string('pi_desarrollo_probelmas_visuales')->nullable();
$table->string('pi_desarrollo_problemas_auditivos')->nullable();
$table->string('pi_desparasitado')->nullable();
$table->string('pi_hospitalizacion_nacer')->nullable();
$table->string('pi_carnet_vacunacion')->nullable();
$table->string('pi_vacuna_bcg_rn')->nullable();
$table->string('pi_vacuna_polio_d1')->nullable();
$table->string('pi_vacuna_polio_d2')->nullable();
$table->string('pi_vacuna_polio_d3')->nullable();
$table->string('pi_vacuna_polio_r1')->nullable();
$table->string('pi_vacuna_polio_r2')->nullable();
$table->string('pi_vacuna_hepatitis_a')->nullable();
$table->string('pi_vacuna_hepatitis_b_rn')->nullable();
$table->string('pi_vacuna_influenza_estacional')->nullable();
$table->string('pi_vacuna_neumococo_d1')->nullable();
$table->string('pi_vacuna_neumococo_d2')->nullable();
$table->string('pi_vacuna_neumococo_d3')->nullable();
$table->string('pi_vacuna_rotavirus_d1')->nullable();
$table->string('pi_vacuna_rotavirus_d2')->nullable();
$table->string('pi_vacuna_fiebre_amarilla')->nullable();
$table->string('pi_vacuna_dpt_d1')->nullable();
$table->string('pi_vacuna_dpt_d2')->nullable();
$table->string('pi_vacuna_pentavalente_d1')->nullable();
$table->string('pi_vacuna_pentavalente_d2')->nullable();
$table->string('pi_vacuna_pentavalente_d3')->nullable();
$table->string('pi_vacuna_srp_d1')->nullable();
$table->string('pi_vacuna_srp_d2')->nullable();
$table->string('pi_vacuna_varicela')->nullable();
$table->string('pi_atencion_medica')->nullable();
$table->string('pi_atencion_enfermeria')->nullable();
$table->string('pi_atencion_lactancia')->nullable();
$table->string('pi_tsh')->nullable();
$table->string('pi_fluor')->nullable();
$table->string('pi_profilaxis')->nullable();
$table->string('pi_sellantes')->nullable();
$table->string('pi_higiene_bucal')->nullable();
$table->string('pi_caries')->nullable();
$table->string('pi_consulta_odontologica')->nullable();
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
