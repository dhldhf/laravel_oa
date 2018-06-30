<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartureToStrokesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strokes', function (Blueprint $table) {
            $table->string('departure');
            $table->string('destination');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('strokes', function (Blueprint $table) {
            $table->dropColumn('departure');
            $table->dropColumn('destination');
        });
    }
}
