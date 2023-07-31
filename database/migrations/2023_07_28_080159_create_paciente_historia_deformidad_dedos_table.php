<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteHistoriaDeformidadDedosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_historia_deformidad_dedos', function (Blueprint $table) {
            $table->id();

            //FK
            $table->unsignedBigInteger('deformidad_dedo_id')->nullable();
            $table->foreign('deformidad_dedo_id')->references('id')->on('deformidad_dedos');

            $table->integer('dedo')->nullable();
            $table->enum('pie', ['izquierdo', 'derecho'])->nullable();

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
        Schema::dropIfExists('paciente_historia_deformidad_dedos');
    }
}
