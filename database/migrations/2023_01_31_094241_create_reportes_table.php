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
        Schema::create('reportes', function (Blueprint $table) {
            $table->bigInteger('id')->unique();
            $table->string('descripcion')->nullable();
            $table->string('columns')->nullable();
            $table->string('query')->nullable();
            $table->bigInteger('user_id');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('user_id')->references('id')->on('users');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
};