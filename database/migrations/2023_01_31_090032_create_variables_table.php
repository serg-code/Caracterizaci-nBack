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
        Schema::create('variables', function (Blueprint $table) {
            $table->bigInteger('id')->unique();
            $table->bigInteger('reporte_id')->unique();
            $table->string('ref')->nullable();
            $table->string('tipo')->nullable();
            $table->string('label')->nullable();
            $table->timestamps();

            $table->foreign('reporte_id')->references('reporte_id')->on('reporte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variables');
    }
};