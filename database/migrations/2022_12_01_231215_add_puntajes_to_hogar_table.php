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
            $table->integer('puntaje_obtenido')->default(0)->after('encuesta');
            $table->integer('puntaje_max')->default(0)->after('encuesta');
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
            $table->dropColumn('puntaje_max');
            $table->dropColumn('puntaje_obtenido');
        });
    }
};
