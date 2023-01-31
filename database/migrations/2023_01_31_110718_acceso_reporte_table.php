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
        Schema::create('acceso_reporte', function (Blueprint $table)
        {
            $table->unsignedBigInteger('reporte_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('reporte_id')->references('id')->on('reportes');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporte');
    }
};
