<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();

            $table->string('ape_paterno');
            $table->string('ape_materno');
            $table->string('nombres');
            $table->string('dni', 20);
            $table->string('celular', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->enum('sexo', ['M', 'F'])->nullable();
            $table->string('fecha_nac', 20)->nullable();
            $table->string('estado_civil', 20)->nullable();
            $table->string('talla', 20)->nullable();
            $table->string('peso', 20)->nullable();
            $table->string('presion_arterial', 20)->nullable();
            $table->string('ocupacion', 100)->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
