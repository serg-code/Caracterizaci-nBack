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
        Schema::create('acceso_cargadores', function (Blueprint $table)
        {
            $table->unsignedBigInteger('id_cargador');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('id_cargador')->references('id')->on('cargadores');
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
        Schema::dropIfExists('aceeso_cargadores');
    }
};
