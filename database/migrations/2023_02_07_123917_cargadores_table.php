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
        Schema::create('cargadores', function (Blueprint $table)
        {
            $table->id('id');
            $table->bigInteger('id_usuario');
            $table->string('nombre')->nullable();
            $table->string('nombre_tabla')->unique();
            $table->text('sql')->nullable();
            $table->boolean('delete_temp')->nullable();
            $table->boolean('procesarErrores');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargadores');
    }
};
