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
        Schema::create('barrio_vereda', function (Blueprint $table)
        {
        $table->uuid('id')->primary()->unique();
        $table->string('nombre');
        $table->enum('tipo', [
            'Barrio',
            'Vereda',
            'Corregimiento',
         ]);
        $table->string('id_municipio');
        $table->timestamps();

        $table->foreign('id_municipio')->references('codigo_dane')->on('municipios');
    });

}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barrio_vereda');
    }
};
