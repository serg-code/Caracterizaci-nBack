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
        Schema::create('municipios', function (Blueprint $table)
        {
            $table->char('codigo_dane', 10)->unique();
            $table->string('nombre');
            $table->char('cod_dpto');
            $table->timestamps();

            $table->primary('codigo_dane');
            $table->foreign('cod_dpto')->references('codigo_dane')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
};
