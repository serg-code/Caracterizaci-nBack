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
        Schema::create('encuesta', function (Blueprint $table) {
            $table->id();
            $table->string('formulario');
            $table->string('seccion');
            $table->string('id');
            $table->string('descripcion');
            $table->string('idrespuesta');
            $table->string('referencia');
            $table->string('tipo_respuesta_id');
            $table->string('orden');    
            $table->string('observaciones');
            $table->string('puntaje');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuesta');
    }
};
