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
        Schema::create('inducciones', function (Blueprint $table)
        {
            $table->id();
            $table->uuid('id_integrante');
            $table->integer('tipo_id');
            // $table->bigInteger('tipo');
            $table->timestamps();

            $table->foreign('id_integrante')->references('id')->on('integrantes');
            $table->foreign('tipo_id')->references('id')->on('tipos_induccion');
            // $table->foreign('tipo')->references('id')->on('tipos_induccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inducciones');
    }
};
