<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkhoraToCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('hora_id')->after('fecha')->nullable();
            $table->foreign('hora_id')->references('id')->on('cita_horarios');
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
            $table->dropColumn(['hora_id']);
            $table->dropForeign(['hora_id']);
        });
    }
}
