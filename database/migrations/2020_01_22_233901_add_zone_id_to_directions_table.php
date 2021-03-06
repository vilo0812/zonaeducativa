<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddZoneIdToDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directions', function (Blueprint $table) {
            $table->bigInteger('zone_id')->unsigned()->nullable();
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directions', function (Blueprint $table) {
            $table->dropForeign(['zone_id']);
            $table->dropColumn('zone_id');
        });
    }
}
