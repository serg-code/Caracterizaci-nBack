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
        Schema::create('identificacion_ciudadana', function (Blueprint $table) {
            $table->uuid('id_integrante')->unique();
            $table->string('grupo_etnia')->nullable();
            $table->string('grupo_atencion_especial')->nullable();
            $table->string('programas')->nullable();
            $table->string('cual_programa')->nullable();
            $table->string('seguridad_social')->nullable();
            $table->string('esta_estudiando')->nullable();
            $table->string('por_que')->nullable();
            $table->string('ocupacion_ingreso')->nullable();
            $table->string('discapacidad')->nullable();
            $table->string('ayudas_tenicas')->nullable();
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
        Schema::dropIfExists('identificacion_ciudadana');
    }
};
