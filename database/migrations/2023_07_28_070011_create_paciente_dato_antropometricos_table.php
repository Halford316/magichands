<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteDatoAntropometricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_dato_antropometricos', function (Blueprint $table) {
            $table->id();

            $table->string('tipo_calzado', 100)->nullable();
            $table->string('nro_calzado', 20)->nullable();
            $table->string('nro_taco', 20)->nullable();
            $table->enum('deporte', ['si', 'no'])->nullable();
            $table->string('arco_pie', 20)->nullable();
            $table->string('tipo', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente_dato_antropometricos');
    }
}
