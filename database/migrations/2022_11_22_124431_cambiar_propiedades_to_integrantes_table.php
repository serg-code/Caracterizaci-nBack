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
            $table->string('tipo_identificacion', 5)->change();
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
        Schema::table('integrantes', function (Blueprint $table)
        {
            //
        });
    }
};
