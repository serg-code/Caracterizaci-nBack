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
        Schema::create('mortalidad', function (Blueprint $table) {
            $table->uuid('hogar_id')->unique();
            $table->string('fallecido_familiar')->nullable();
            $table->enum('sexo_fallecido', [
                'Femenino',
                'Masculino',
            ]);
            $table->string('edad_fallecido')->nullable();
            $table->string('causa_muerte')->nullable();
            $table->string('fecha_muerte')->nullable();       
            $table->timestamps();

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
        Schema::dropIfExists('mortalidad');
    }
};
