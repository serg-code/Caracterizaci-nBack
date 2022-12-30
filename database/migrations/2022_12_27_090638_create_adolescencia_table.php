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
            $table->string('adol_asesoria_anticonceptiva')->nullable();
            $table->string('adol_planifica')->nullable();
            $table->string('adol_metodo_planficica')->nullable();
            $table->string('adol_desde_cuando_planifica')->nullable();
            $table->string('adol_razon_no_planifica')->nullable();
            $table->string('adol_atencion_medica')->nullable();
            $table->string('adol_atencion_enfermeria')->nullable();
            $table->string('adol_salud_bucal')->nullable();
            $table->string('adol_fluor')->nullable();
            $table->string('adol_profilaxis')->nullable();
            $table->string('adol_sellantes')->nullable();
            $table->string('adol_supragingival')->nullable();
            $table->string('adol_vacunacion')->nullable();
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
