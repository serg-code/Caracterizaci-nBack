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
        Schema::create('juventud', function (Blueprint $table) {
            $table->uuid('id_integrante')->unique();
            $table->string('juv_cancer_cuello_uterino')->nullable();
$table->string('juv_colposcopia')->nullable();
$table->string('juv_bioscopia_cervico')->nullable();
$table->string('juv_examen_seno')->nullable();
$table->string('juv_planific')->nullable();
$table->string('juv_metodo_planifica')->nullable();
$table->string('juv_tiempo_metodo')->nullable();
$table->string('juv_asesoria_anticoncepcion')->nullable();
$table->string('juv_razones_no_planifica')->nullable();
$table->string('juv_parejas_sexuales_al_año')->nullable();
$table->string('juv_atencion_medica')->nullable();
$table->string('juv_atencion_enfermeria')->nullable();
$table->string('juv_salud_vocal')->nullable();
$table->string('juv_vasectomia')->nullable();
$table->string('juv_esterilizacion_femenina')->nullable();
$table->string('juv_vias_esterilizacion')->nullable();
$table->string('juv_profilaxis')->nullable();
$table->string('juv_detartraje_supragingival')->nullable();
$table->string('juv_prueba_vih')->nullable();
$table->string('juv_antecedentes_diabetes')->nullable();
$table->string('juv_antecedentes_hipertension')->nullable();
$table->string('juv_alteracion_colesterol')->nullable();
$table->string('juv_presion_sistolica')->nullable();
$table->string('juv_presion_diastolica')->nullable();
$table->string('juv_perimetro_abdominal')->nullable();
$table->string('juv_enfermedad_cronica')->nullable();
$table->string('juv_cual_enfermedad_cronica')->nullable();
$table->string('juv_seguimiento_enfermedad_cronica')->nullable();
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
        Schema::dropIfExists('juventud');
    }
};
