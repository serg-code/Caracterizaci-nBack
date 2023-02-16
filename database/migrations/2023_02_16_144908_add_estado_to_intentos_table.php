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
        Schema::table('intentos', function (Blueprint $table) {
            $table->enum('estado', ['ACTIVO', 'INACTIVO'])->default('ACTIVO')->after('cantidad_errores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intentos', function (Blueprint $table) {
            //
        });
    }
};
