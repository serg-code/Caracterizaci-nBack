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
        Schema::create('cuidados_domiciliarios', function (Blueprint $table) {
            $table->uuid('id_integrante');
            $table->string('cuidados_domiciliarios')->nullable();
            $table->string('diagnostico_principal')->nullable();
            $table->string('causa')->nullable();
            $table->string('fecha_inicio_domiciliario')->nullable();
            $table->string('oxigeno_domiciliario')->nullable();
            $table->string('plan_aprobado')->nullable();
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
        Schema::dropIfExists('cuidados_domiciliarios');
    }
};
