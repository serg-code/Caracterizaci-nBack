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
        Schema::create('opciones', function (Blueprint $table)
        {
            $table->id();
            $table->string('ref_campo');
            $table->string('pregunta_opcion');
            $table->integer('valor')->default(0)->comment('El puntaje que tiene la opcion');
            $table->timestamps();

            $table->foreign('ref_campo')->references('ref_campo')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opciones');
    }
};
