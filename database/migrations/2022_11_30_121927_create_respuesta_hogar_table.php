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
        Schema::create('respuestas_hogar', function (Blueprint $table)
        {
            $table->id('id');
            $table->uuid('hogar_uuid');
            $table->string('ref_campo');
            $table->integer('puntaje')->nullable();
            $table->string('pregunta');
            $table->string('respuesta');
            $table->timestamps();

            $table->foreign('hogar_uuid')->references('id')->on('hogar');
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
