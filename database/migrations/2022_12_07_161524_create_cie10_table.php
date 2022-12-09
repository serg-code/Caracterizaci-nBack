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
        Schema::create('cie10', function (Blueprint $table) {
            $table->string('codigo', 4)->primary()->unique();
            $table->string('descrip');
            $table->string('rO');
            $table->string('altoCosto');
            $table->string('patologia');
            $table->string('genero');
            $table->string('eMin');
            $table->string('eMax');
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