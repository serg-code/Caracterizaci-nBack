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
        Schema::table('cargadores', function (Blueprint $table) {
            $table->text('descripcion')->after('nombre')->nullable();
            $table->enum('estado', ['ACTIVO', 'INACTIVO'])->default('ACTIVO')->after('procesarErrores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cargadores', function (Blueprint $table) {
            //
        });
    }
};
