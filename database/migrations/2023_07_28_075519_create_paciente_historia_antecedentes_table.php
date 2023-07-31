<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteHistoriaAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_historia_antecedentes', function (Blueprint $table) {
            $table->id();

            //FK
            $table->unsignedBigInteger('enfermedad_antecedente_id')->nullable();
            $table->foreign('enfermedad_antecedente_id')->references('id')->on('enfermedad_antecedentes');

            $table->string('otro_detalle')->nullable();

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
        Schema::dropIfExists('paciente_historia_antecedentes');
    }
}
