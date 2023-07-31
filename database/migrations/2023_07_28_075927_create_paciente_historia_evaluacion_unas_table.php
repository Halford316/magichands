<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteHistoriaEvaluacionUnasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_historia_evaluacion_unas', function (Blueprint $table) {
            $table->id();

            //FK
            $table->unsignedBigInteger('patologia_una_id')->nullable();
            $table->foreign('patologia_una_id')->references('id')->on('patologia_unas');

            $table->unsignedBigInteger('paciente_historia_id')->nullable();
            $table->foreign('paciente_historia_id')->references('id')->on('paciente_historias');

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
        Schema::dropIfExists('paciente_historia_evaluacion_unas');
    }
}
