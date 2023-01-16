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
            $table->uuid('barrio_vereda_id')->comment('barrio / vereda')->nullable();
            $table->enum('zona', [
                'Barrio',
                'Vereda',
                'Corregimiento',
                'Rural disperso',
            ])->nullable();
            $table->string('cod_dpto', 2)->comment('codigo dane del departamento')->nullable();
            $table->string('cod_mun', 10)->comment('codigo dane del municipio')->nullable();
            $table->integer('tipo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('geolocalizacion')->nullable();
            $table->enum('estado_registro', ['ABIERTO', 'FINALIZADO'])->default('ABIERTO');
            $table->boolean('realizo_encuesta')->nullable();
            $table->integer('motivos')->nullable();
            $table->text('observaciones')->nullable();
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
