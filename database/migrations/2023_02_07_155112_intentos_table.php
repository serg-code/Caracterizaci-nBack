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
        Schema::create('intentos', function (Blueprint $table)
        {
            $table->uuid('id')->unique();
            $table->bigInteger('id_usuario');
            $table->id('id_cargador');
            $table->string('nombre_archivo')->nullable();
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_cargador')->references('id')->on('cargadores');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intentos');
    }
};
