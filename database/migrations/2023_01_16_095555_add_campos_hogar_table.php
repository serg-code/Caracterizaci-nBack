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
        Schema::table('hogar', function (Blueprint $table)
        {
            $table->boolean('realizo_encuesta')->nullable()->after('estado_registro');
                   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hogar', function (Blueprint $table)
        {
        $table->boolean('realizo_encuesta')->nullable();
            
        });
    }
};
