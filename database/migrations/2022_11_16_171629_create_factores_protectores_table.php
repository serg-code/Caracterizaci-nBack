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
        Schema::create('factores_protectores', function (Blueprint $table)
        {
            $table->uuid('hogar_id', 36);
            $table->string('tipo_familia')->nullable();
            $table->string('duermen_ninos_ninas_adultos')->nullable();
            $table->string('problemas_alcohol')->nullable();
            $table->string('consume_tranquilizantes')->nullable();
            $table->string('relaciones_cordiales_respetuosasa')->nullable();
            $table->string('lavar_manos_antes_comer')->nullable();
            $table->string('lavar_manos_antes_preparar_alimentos')->nullable();
            $table->string('fumigar_vivienda')->nullable();
            $table->string('secretaria_fumigado')->nullable();
            $table->string('acido_borico_cucarachas')->nullable();
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
        Schema::dropIfExists('factores_protectores');
    }
};
