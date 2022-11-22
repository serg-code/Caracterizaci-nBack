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
            $table->char('hogar_id', 36);
            $table->string('tipo_familia');
            $table->string('duermen_ninos_ninas_adultos');
            $table->string('problemas_alcohol');
            $table->string('consume_tranquilizantes');
            $table->string('relaciones_cordiales_respetuosasa');
            $table->string('lavar_manos_antes_comer');
            $table->string('lavar_manos_antes_preparar_alimentos');
            $table->string('fumigar_vivienda');
            $table->string('secretaria_fumigado');
            $table->string('acido_borico_cucarachas');

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
