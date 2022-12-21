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
        Schema::create('vivienda', function (Blueprint $table) {
                $table->uuid('id_integrante')->unique();
                $table->string('encuesta_sisben')->nullable();
                $table->string('ficha_sisben')->nullable();
                $table->string('puntaje_sisben')->nullable();
                $table->string('nivel_sisben')->nullable();
                $table->string('tipos_vivienda')->nullable();
                $table->string('tipos_tenecia')->nullable();
                $table->string('servicios_sanitarios')->nullable();
                $table->string('tipos_alumbrado')->nullable();
                $table->string('dormitorios')->nullable();
                $table->string('humo_vivienda')->nullable();
                $table->string('fuentes_agua')->nullable();
                $table->string('tratamiento_agua')->nullable();
                $table->string('tipos_tratamiento_agua')->nullable();
                $table->string('tipos_disposicion_basura')->nullable();
                $table->string('reciclan')->nullable();
                $table->string('iluminacion_adecuada')->nullable();
                $table->string('ventilacion_adecuada')->nullable();
                $table->string('roedores')->nullable();
                $table->string('reservorios_agua')->nullable();
                $table->string('anjenos')->nullable();
                $table->string('tipos_insectos_vectores')->nullable();
                $table->string('conservacion_alimentos')->nullable();
                $table->string('actividad_productiva')->nullable();
                $table->string('tipos_material_piso')->nullable();
                $table->string('tipos_material_techo')->nullable();
                $table->string('tipos_material_paredes')->nullable();
                $table->timestamps();

                $table->foreign('hogar_id')->references('id')->on('hogar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vivienda');
    }
};
