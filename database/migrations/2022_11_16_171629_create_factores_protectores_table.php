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
            $table->string('Tipo_familia');
            $table->string('Duermen_niños_niñas_adultos');
            $table->string('Problemas_alcohol');
            $table->string('Consume_tranquilizantes');
            $table->string('Relaciones_cordiales_respetuosasa');
            $table->string('Lavar_manos_antes_de_comer');
            $table->string('Lavar_manos_antes_de_preparar_alimentos');
            $table->string('Fumigar_vivienda');
            $table->string('Secretaría_ha_fumigado');
            $table->string('Acido_borico_cucarachas');

            $table->timestamps();


            $table->foreign('hogar_id')->references('id')->on('hogar');
            // $table->foreign([
            //     'Tipo_familia',
            //     'Duermen_niños_niñas_adultos',
            //     'Problemas_alcohol',
            //     'Consume_tranquilizantes',
            //     'Relaciones_cordiales_respetuosasa',
            //     'Lavar_manos_antes_de_comer',
            //     'Lavar_manos_antes_de_preparar_alimentos',
            //     'Fumigar_vivienda', 'Secretaría_ha_fumigado',
            //     'Acido_borico_cucarachas',
            // ])->references('ref_campo')->on('preguntas');
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
