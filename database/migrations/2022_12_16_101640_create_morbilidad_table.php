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
        Schema::create('morbilidad', function (Blueprint $table) {
            $table->uuid('id_integrante')->unique();
            $table->string('enfermedad_cronica')->nullable();
            $table->string('enfermedad_cronica_cual')->nullable();
            $table->string('controlada')->nullable();
            $table->string('propiedades_respiratorio')->nullable();
            $table->string('propiedades_piel')->nullable();
            $table->string('enfermedades_congenitas')->nullable();
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
        Schema::dropIfExists('morbilidad');
    }
};
