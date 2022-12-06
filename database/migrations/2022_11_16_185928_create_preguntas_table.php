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
        Schema::create('preguntas', function (Blueprint $table)
        {
            $table->string('ref_campo');
            $table->string('ref_seccion');
            $table->string('descripcion');
            $table->enum('tipo', [
                'numero',
                'texto',
                'texto_largo',
                'seleccion',
                'fecha',
                'seleccion_multiple',
            ]);
            $table->boolean('estado')->default(1);
            $table->timestamps();

            $table->primary('ref_campo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
};
