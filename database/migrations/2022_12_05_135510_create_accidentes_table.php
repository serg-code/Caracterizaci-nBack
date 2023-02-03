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
        Schema::create('accidentes', function (Blueprint $table)
        {
            $table->uuid('id_integrante')->unique();
            $table->string('accidentes_transito')->nullable();
            $table->string('tipo_lesion')->nullable();
            $table->string('accidentes_laborales')->nullable();
            $table->timestamps();

            $table->foreign('id_integrante')->references('id')->on('integrantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accidentes');
    }
};
