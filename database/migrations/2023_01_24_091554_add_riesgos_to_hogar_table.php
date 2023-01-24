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
            $table->integer('porcentaje')->nullable()->comment('Porcentaje de riesgo')->after('motivos');
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
        Schema::table('hogar', function (Blueprint $table)
        {
            //
        });
    }
};
