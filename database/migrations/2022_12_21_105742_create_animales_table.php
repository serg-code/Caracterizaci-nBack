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
        Schema::create('animales', function (Blueprint $table) {
            $table->uuid('id_integrante')->unique();
            $table->string('gatos')->nullable();
            $table->string('gatos_cuantos')->nullable();
            $table->string('gatos_vacunados')->nullable();
            $table->string('perros')->nullable();
            $table->string('perros_cuantos')->nullable();
            $table->string('perros_vacunados')->nullable();
            $table->string('equinos')->nullable();
            $table->string('equinos_cuantos')->nullable();
            $table->string('equinos_vacunados')->nullable();
            $table->string('aves')->nullable();
            $table->string('porcinos')->nullable();
            $table->string('porcinos_cuantos')->nullable();
            $table->string('porcinos_vacunados')->nullable();
            $table->string('animales_no_rabia')->nullable();
            $table->string('animales_si_rabia')->nullable();
            $table->timestamps();

            $table->foreign('hogar_id')->references('id')->on('hogar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animales');
    }
};
