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
            $table->char('hogar_id', 36);
            $table->string('consumo_huevos_crudos');
            $table->string('alimentos_perecederos');
            $table->string('c');
            $table->string('lavar_frutas_verduras');
            $table->string('alimentos_crudos_separados_cocidos');
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
