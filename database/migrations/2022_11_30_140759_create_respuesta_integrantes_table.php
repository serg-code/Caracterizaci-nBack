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
        Schema::create('respuestas_integrantes', function (Blueprint $table)
        {
            $table->id();
            $table->uuid('id_integrante');
            $table->string('ref_campo');
            $table->integer('puntaje')->nullable();
            $table->string('pregunta');
            $table->string('respuesta');
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
        Schema::dropIfExists('respuestas_hogar');
    }
};
