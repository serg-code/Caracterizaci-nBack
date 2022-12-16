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
        Schema::create('salud_mental', function (Blueprint $table) {
            $table->uuid('id_integrante')->unique();
            $table->string('depresion')->nullable();
            $table->string('intento_suicidio')->nullable();
            $table->string('esquizofrenia')->nullable();
            $table->string('trastorno_afectivo')->nullable();
            $table->string('bulimia')->nullable();
            $table->string('anorexia')->nullable();
            $table->string('tratamiento')->nullable();
            $table->string('diagnostico')->nullable();
            $table->string('violencia_fisica')->nullable();
            $table->string('violencia_psicologica')->nullable();
            $table->string('violencia_sexual')->nullable();
            $table->string('violencia_institucional')->nullable();
            $table->string('violencia_social')->nullable();
            $table->string('violencia_gestacion')->nullable();
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
        Schema::dropIfExists('salud_mental');
    }
};
