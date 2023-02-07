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
        Schema::create('log_errores', function (Blueprint $table)
        {
            $table->string('texto_error');
            $table->string('ubicacion_error');
            $table->uuid('intento');
            $table->timestamps();

            $table->foreign('intento')->references('id')->on('intentos');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_errores');
    }
};
