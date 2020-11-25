<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSectorZoneIdToFloorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('floors', function (Blueprint $table) {
            // $table->bigInteger('sector_zone_id')->unsigned()->nullable();
            // $table->foreign('sector_zone_id')->references('id')->on('sectors_zones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('floors', function (Blueprint $table) {
            // $table->dropForeign(['sector_zone_id']);
            // $table->dropColumn('sector_zone_id');
        });
    }
}
