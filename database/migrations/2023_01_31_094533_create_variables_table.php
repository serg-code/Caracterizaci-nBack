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
        Schema::create('variables', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('reporte_id');
            $table->string('ref')->nullable();
            $table->enum('tipo', [
                'date',
                'number',
                'text',
            ])->nullable();
            $table->string('label')->nullable();
            $table->timestamps();

            $table->foreign('reporte_id')->references('id')->on('reportes');
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
