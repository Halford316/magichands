<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkPacienteToPacienteDatoAntropometricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paciente_dato_antropometricos', function (Blueprint $table) {
            //FK
            $table->unsignedBigInteger('paciente_id')->after('tipo')->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paciente_dato_antropometricos', function (Blueprint $table) {
            //
            $table->dropColumn(['paciente_id']);
            $table->dropForeign(['paciente_id']);
        });
    }
}
