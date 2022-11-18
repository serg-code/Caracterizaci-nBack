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
        Schema::create('Habitos_Consumos', function (Blueprint $table)
        {
            $table->char('hogar_id', 36);
            $table->string('consumo_huevos_crudos');
            $table->string('alimentos_perecederos');
            $table->string('hierve_leche');
            $table->string('lavar_frutasYverduras');
            $table->string('alimentos_crudos_separados_de_cocidos');
            $table->timestamps();

            
            $table->foreign('hogar_id')->references('id')->on('hogar');
            $table->foreign([
                'consumo_huevos_crudos',
                'alimentos_perecederos',
                'hierve_leche',
                'lavar_frutasYverduras',
                'alimentos_crudos_separados_de_cocidos',
                ])->references('ref_campo')->on('preguntas');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Habitos_Consumos');
    }
};