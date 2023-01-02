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
        Schema::create('adultez', function (Blueprint $table) {
                $table->uuid('id_integrante')->unique();
                $table->string('adul_valoracion_nutricional')->nullable();
                $table->string('adul_imc')->nullable();
                $table->string('adul_asesoria_anticoncepcion')->nullable();
                $table->string('adul_planifica')->nullable();
                $table->string('adul_metodo_planifica')->nullable();
                $table->string('adul_desde_cuando_planifica')->nullable();
                $table->string('adul_razones_no_planifica')->nullable();
                $table->string('adul_parejas_sexuales_al_año')->nullable();
                $table->string('adul_enfermedad_cronica')->nullable();
                $table->string('adul_cual_enfermedad_cronica')->nullable();
                $table->string('adul_seguimiento_enfermedad_cronica')->nullable();
                $table->string('adul_control_adultos')->nullable();
                $table->string('adul_antecedentes_diabetes')->nullable();
                $table->string('adul_antecedentes_hipertension')->nullable();
                $table->string('adul_antecedentes_colesterol')->nullable();
                $table->string('adul_perimetro_abdominal')->nullable();
                $table->string('adul_atencion_medica')->nullable();
                $table->string('adul_salud_bucal')->nullable();
                $table->string('adul_cancer_cuello_uterino_adn_vph')->nullable();
                $table->string('adul_cancer_cuello_uterino_adn_vph_positivo')->nullable();
                $table->string('adul_colposcopia_cervico_uterina')->nullable();
                $table->string('adul_biopsia_cervico_uterina')->nullable();
                $table->string('adul_cancer_mama_mamografia')->nullable();
                $table->string('adul_cancer_mama_valoracion_clinica')->nullable();
                $table->string('adul_cancer_prostata')->nullable();
                $table->string('adul_asesoria_anticoncepcion')->nullable();
                $table->string('adul_vasectomia')->nullable();
                $table->string('adul_esterilizacion_femenina')->nullable();
                $table->string('adul_vias_esterilizacion')->nullable();
                $table->string('adul_profilaxis')->nullable();
                $table->string('adul_detartraje_supragingival')->nullable();
                $table->string('adul_fiebre_amarilla')->nullable();
                $table->string('adul_prueba_vih')->nullable();
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
        Schema::dropIfExists('adultez');
    }
};
