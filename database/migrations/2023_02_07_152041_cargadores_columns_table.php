<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargadores_columns', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cargador');
            $table->string('nombre');
            $table->text('json');
            $table->timestamps();

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
        Schema::dropIfExists('cargadores_columns');
    }
};