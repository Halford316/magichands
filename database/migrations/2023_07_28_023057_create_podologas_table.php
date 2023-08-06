<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodologasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podologas', function (Blueprint $table) {
            $table->id();

            $table->enum('tipo_contrato', ['planilla', 'destajo']);
            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->string('nombres');
            $table->string('dni', 20);
            $table->string('telefono', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono_emergencia', 50)->nullable();
            $table->string('contacto_emergencia', 100)->nullable();
            $table->string('fecha_ingreso', 20)->nullable();
            $table->string('horario_inicio', 20)->nullable();
            $table->string('horario_fin', 20)->nullable();
            $table->integer('comision_medicamento')->nullable();
            $table->integer('comision_ortesicos')->nullable();
            $table->integer('comision_atencion')->nullable();
            $table->boolean('activo')->default(1);

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
        Schema::dropIfExists('podologas');
    }
}
