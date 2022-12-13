<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return vostring
     */
    public function up()
    {
        Schema::create('cie10', function (Blueprint $table)
        {
            $table->string('codigo', 4)->primary()->unique();
            $table->string('descrip');
            $table->string('altoCosto')->nullable();
            $table->string('patologia')->nullable();
            $table->string('genero')->nullable();
            $table->string('eMin')->nullable();
            $table->string('eMax')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return vostring
     */
    public function down()
    {
        Schema::dropIfExists('cie10');
    }
};
