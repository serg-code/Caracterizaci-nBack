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
        Schema::create('cuidado_enfermedades', function (Blueprint $table) {
            $table->uuid('id_integrante')->unique();
            $table->string('cancer')->nullable();
            $table->string('artritis_remautidea')->nullable();
            $table->string('vih_sida')->nullable();
            $table->string('hemofilia')->nullable();
            $table->string('insuficiencia_renal')->nullable();
            $table->string('fuma')->nullable();
            $table->string('actividad_fisica')->nullable();
            $table->string('vacuna_fiebre_amarilla')->nullable();
            $table->string('enfermedades_cronicas')->nullable();
            $table->string('diabetes')->nullable();
            $table->string('hipertencion_trimestral')->nullable();
            $table->string('diabetes_trimestral')->nullable();
            $table->string('tension_sistolica')->nullable();
            $table->string('tension_diastolica')->nullable();
            $table->string('hemoglobina_glococilada')->nullable();
            $table->string('enfermedades_costosas')->nullable();
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
        Schema::dropIfExists('cuidado_enfermedades');
    }
};