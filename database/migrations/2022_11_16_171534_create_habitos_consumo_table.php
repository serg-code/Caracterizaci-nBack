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
        Schema::create('habitos_consumo', function (Blueprint $table)
        {
            $table->uuid('hogar_id', 36);
            $table->string('consumo_huevos_crudos')->nullable();
            $table->string('alimentos_perecederos')->nullable();
            $table->string('hierve_leche')->nullable();
            $table->string('lavar_frutas_verduras')->nullable();
            $table->string('alimentos_crudos_separados_cocidos')->nullable();
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
        Schema::dropIfExists('habitos_consumo');
    }
};
