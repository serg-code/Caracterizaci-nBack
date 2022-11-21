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
            $table->string('departamento');
            $table->string('municipio');
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
