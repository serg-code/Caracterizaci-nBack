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
        Schema::create('inducciones', function (Blueprint $table)
        {
            $table->id();
            $table->enum('curso_vida', [
                'primera infancia',
                'infancia',
                'adolescencia',
                'juventud',
                'adultez',
                'vejez',
                'preconcepcional',
                'maternoperinatal',
                'sin curso vida'
            ]);
            $table->string('tipo_atencion');
            $table->string('genero');
            $table->string('edad_minima');
            $table->string('edad_maxima');
            $table->string('grupo_etario');
            $table->string('frecuencia');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inducciones');
    }
};
