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
        Schema::create('seguridad_alimentaria', function (Blueprint $table) {
$table->uuid('hogar_id')->unique();
$table->string('animales_silvestres')->nullable();
$table->string('consume_cerdo_res_pollo')->nullable();
$table->string('consume_huevos')->nullable();
$table->string('consume_frijol_lentejas')->nullable();
$table->string('consume_lacteos')->nullable();
$table->string('consume_harinas')->nullable();
$table->string('consume_verduras')->nullable();
$table->string('consume_Frutas_frescas')->nullable();
$table->string('consume_enlatados')->nullable();
$table->string('consume_Platano_yuca')->nullable();
$table->string('consume_gaseosas')->nullable();
$table->timestamps();

$table->foreign('hogar_id')->references('id')->on('hogar');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguridad_alimentaria');
    }
};
