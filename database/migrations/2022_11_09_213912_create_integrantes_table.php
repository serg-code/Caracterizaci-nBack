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
        Schema::create('integrantes', function (Blueprint $table)
        {
            $table->uuid('id')->unique();
            $table->string('tipo_identificacion', 3);
            $table->string('identificacion');
            $table->string('primer_nombre');
            $table->string('segundo_nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->enum('rh', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->enum('estado_civil', [
                'soltero',
                'casado',
                'divorciado',
                'viudo ',
                'concubinato',
                'separación en proceso judicial'
            ]);
            $table->uuid('hogar_id');
            $table->string('telefono', 10);
            $table->string('correo');
            $table->enum('cabeza_familia', ['si', 'no']);
            $table->timestamps();

            $table->primary('id');
            $table->foreign('tipo_identificacion')->references('id')->on('tipo_identificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integrantes');
    }
};
