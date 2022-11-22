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
        Schema::table('hogar', function (Blueprint $table)
        {
            $table->foreign('cod_dpto')->references('codigo_dane')->on('departamentos');
            $table->foreign('cod_mun')->references('codigo_dane')->on('municipios');
            $table->foreign('tipo')->references('id')->on('tipo_hogar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hogar', function (Blueprint $table)
        {
            //
        });
    }
};
