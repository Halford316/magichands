<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();

            $table->string('fecha', 20);
            $table->string('tipo_servicio', 50)->nullable();
            $table->text('motivo_consulta')->nullable();
            $table->string('estado', 50)->nullable();
            $table->string('tipo_cita', 20)->nullable();
            $table->enum('cita_status', ['pendiente', 'iniciada', 'concluida'])->default('pendiente');

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
        Schema::dropIfExists('citas');
    }
}
