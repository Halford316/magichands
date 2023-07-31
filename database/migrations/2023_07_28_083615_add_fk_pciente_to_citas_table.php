<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkPcienteToCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            //FK
            $table->unsignedBigInteger('paciente_id')->after('cita_status')->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes');

            $table->unsignedBigInteger('consultorio_id')->after('paciente_id')->nullable();
            $table->foreign('consultorio_id')->references('id')->on('consultorios');

            $table->unsignedBigInteger('podologa_id')->after('consultorio_id')->nullable();
            $table->foreign('podologa_id')->references('id')->on('podologas');

            $table->unsignedBigInteger('user_id')->after('podologa_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('forma_pago', 50)->after('user_id')->nullable();
            $table->string('proxima_cita', 20)->after('forma_pago')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            //
            $table->dropColumn(['paciente_id', 'consultorio_id', 'podologa_id', 'user_id', 'forma_pago', 'proxima_cita']);
            $table->dropForeign(['paciente_id', 'consultorio_id', 'podologa_id', 'user_id']);
        });
    }
}
