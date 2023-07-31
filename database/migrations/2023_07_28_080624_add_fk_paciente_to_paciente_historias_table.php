<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkPacienteToPacienteHistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paciente_historias', function (Blueprint $table) {
            //FK
            $table->unsignedBigInteger('paciente_id')->after('motivo_consulta')->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes');

            $table->unsignedBigInteger('user_id')->after('paciente_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paciente_historias', function (Blueprint $table) {
            //
            $table->dropColumn(['paciente_id', 'user_id']);
            $table->dropForeign(['paciente_id', 'user_id']);
        });
    }
}
