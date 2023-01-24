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
        Schema::table('integrantes', function (Blueprint $table)
        {
            $table->integer('porcentaje')->nullable()->comment('Porcentaje de riesgo')->after('estado_registro');
            $table->enum('color', [
                'green',
                'orange',
                'red',
            ])->nullable()->comment('Color para identificar el riesgo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('integrantes', function (Blueprint $table)
        {
            //
        });
    }
};
