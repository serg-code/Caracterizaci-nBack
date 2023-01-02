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
        Schema::create('vejez', function (Blueprint $table) {
            $table->uuid('id_integrante')->unique();
        $table->string('ve_valoracion_peso')->nullable();
        $table->string('ve_valoracion_talla')->nullable();
        $table->string('ve_imc')->nullable();
        $table->string('ve_asesoria_anticoncepcion')->nullable();
        $table->string('ve_planifica')->nullable();
        $table->string('ve_metodo_planifica')->nullable();
        $table->string('ve_desde_cuando_planifica')->nullable();
        $table->string('ve_razones_no_planifica')->nullable();
        $table->string('ve_parejas_sexuales_al_año')->nullable();
        $table->string('ve_enfermedad_cronica')->nullable();
        $table->string('ve_cual_enfermedad_cronica')->nullable();
        $table->string('ve_seguimiento_enfermedad_cronica')->nullable();
        $table->string('ve_control_adultos')->nullable();
        $table->string('ve_antecedentes_diabetes')->nullable();
        $table->string('ve_antecedentes_hipertension')->nullable();
        $table->string('ve_alteracion_colesterol')->nullable();
        $table->string('ve_perimetro_abdominal')->nullable();
        $table->string('ve_salud_medica')->nullable();
        $table->string('ve_salud_bucal')->nullable();
        $table->string('ve_cancer_cuello_uterino_adn_vph')->nullable();
        $table->string('ve_cancer_cuello_uterino_adn_vph_positivo')->nullable();
        $table->string('ve_colposcopia_uterina')->nullable();
        $table->string('ve_bioscopia_uterina')->nullable();
        $table->string('ve_cancer_mama_mamografia')->nullable();
        $table->string('ve_cancer_mama_valoracion_clinica')->nullable();
        $table->string('ve_cancer_prostata_psa')->nullable();
        $table->string('ve_cancer_prostata_rectal')->nullable();
        $table->string('ve_aserori_anticoncepcion')->nullable();
        $table->string('ve_vasectomia')->nullable();
        $table->string('ve_esterilizacion_femenina')->nullable();
        $table->string('ve_vias_esterilizacion')->nullable();
        $table->string('ve_profilaxis')->nullable();
        $table->string('ve_detartraje_supragingival')->nullable();
        $table->string('ve_vacuna_fiebre_amarilla')->nullable();
        $table->string('ve_vacuna_influenza')->nullable();
        $table->string('ve_prueba_vih')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vejez');
    }
};
