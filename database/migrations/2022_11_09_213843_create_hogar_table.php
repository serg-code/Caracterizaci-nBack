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
        Schema::create('hogar', function (Blueprint $table)
        {
            $table->uuid('id')->unique();
            $table->string('zona');
            $table->string('cod_dpto', 2)->comment('codigo dane del departamento');
            $table->string('cod_mun', 3)->comment('codigo dane del municipio');
            $table->integer('tipo');
            $table->string('barrio')->comment('barrio / vereda');
            $table->string('direccion');
            $table->string('geolocalizacion');
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hogar');
    }
};
