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
        Schema::create('enfermedades_salud_publica', function (Blueprint $table)
        {
            $table->uuid('id_integrante')->unique();
            $table->string('tuberculosis')->nullable();
            $table->string('lepra')->nullable();
            $table->string('chagas')->nullable();
            $table->string('sifilis')->nullable();
            $table->string('dengue')->nullable();
            $table->string('malaria')->nullable();
            $table->string('leishmaniasis')->nullable();
            $table->string('brucelosis')->nullable();
            $table->string('sika_chicungunya')->nullable();
            $table->string('varicela')->nullable();
            $table->string('intoxicacion')->nullable();
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
        Schema::dropIfExists('enfermedades_salud_publica');
    }
};
