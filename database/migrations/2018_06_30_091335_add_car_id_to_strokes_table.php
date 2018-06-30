<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarIdToStrokesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strokes', function (Blueprint $table) {
            $table->integer('car_id');
            $table->string('end_time');
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
            $table->dropColumn('car_id');
            $table->dropColumn('end_time');
        });
    }
}
