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
        Schema::create('infancia', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_integrante')->unique();
            $table->string('in_peso')->nullable();
        $table->string('in_talla')->nullable();
        $table->string('in_desarrollo_lenguaje')->nullable();
        $table->string('in_desarrollo_motora')->nullable();
        $table->string('in_desarrollo_conducta')->nullable();
        $table->string('in_desarrollo_probelmas_visuales')->nullable();
        $table->string('in_desarrollo_problemas_auditivos')->nullable();
        $table->string('in_desparasitado')->nullable();
        $table->string('in_carnet_vacunacion')->nullable();
        $table->string('in_vacuna_dpt_r2')->nullable();
        $table->string('in_vacuna_polio_r2')->nullable();
        $table->string('in_vacuna_srp_r1')->nullable();
        $table->string('in_vacuna_fiebre_amarilla_9_a_11_anios')->nullable();
        $table->string('in_vacuna_vph_d1_9_a_11_anios')->nullable();
        $table->string('in_vacuna_vph_d2_9_a_11_anios')->nullable();
        $table->string('in_vacuna_vph_d3_9_a_11_anios')->nullable();
        $table->string('in_caries')->nullable();
        $table->string('in_consulta_odontologica_6_a_11_anios')->nullable();
        $table->string('in_uso_seda_dental')->nullable();
        $table->string('in_fluor_6_a_11_anios')->nullable();
        $table->string('in_profilaxis_6_a_11_anios')->nullable();
        $table->string('in_sellantes_6_a_11_anios')->nullable();
        $table->string('in_atencion_medica_6_10_anios')->nullable();
        $table->string('in_atencion_enfermeria_7_11_anios')->nullable();
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
        Schema::dropIfExists('infancia');
    }
};
