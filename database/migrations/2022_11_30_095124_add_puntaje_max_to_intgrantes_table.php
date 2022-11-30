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
        Schema::table('intgrantes', function (Blueprint $table) {
            $table->string('puntaje_max')->nullable()->after('segundo_apellido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intgrantes', function (Blueprint $table) {
            $table -> dropColumn('puntaje_max');
        });
    }
};
