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
        Schema::create('adolescencia', function (Blueprint $table) {
            $table->uuid('id_integrante')->unique();
            $table->string('adol_peso')->nullable();
            $table->string('adol_talla')->nullable();
            $table->string('adol_imc')->nullable();
            $table->string('adol_asesoria_anticonceptiva_12_a_17_anios')->nullable();
            $table->string('adol_planifica')->nullable();
            $table->string('adol_metodo_planficica')->nullable();
            $table->string('adol_desde_cuando_planifica')->nullable();
            $table->string('adol_razon_no_planifica')->nullable();
            $table->string('adol_atencion_medica_12_16_anios')->nullable();
            $table->string('adol_atencion_enfermeria_13_17_anios')->nullable();
            $table->string('adol_salud_bucal_12_a_17_anios')->nullable();
            $table->string('adol_fluor_12_a_17_anios')->nullable();
            $table->string('adol_profilaxis_12_a_17_anios')->nullable();
            $table->string('adol_sellantes_12_a_17_anios')->nullable();
            $table->string('adol_supragingival_12_a_17_anios')->nullable();
            $table->string('adol_vacunacion_12_a_17_anios')->nullable();
            $table->string('adol_vacuna_fiebre_amarilla')->nullable();
            $table->string('adol_vacuna_vph')->nullable();
            $table->string('adol_vacuna_toxoide_tetanico')->nullable();
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
        Schema::dropIfExists('adeolescencia');
    }
};
