<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkLocalToConsultoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultorios', function (Blueprint $table) {
            //FK
            $table->unsignedBigInteger('local_id')->after('activo')->nullable();
            $table->foreign('local_id')->references('id')->on('locals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultorios', function (Blueprint $table) {
            //
            $table->dropColumn(['local_id']);
            $table->dropForeign(['local_id']);
        });
    }
}
