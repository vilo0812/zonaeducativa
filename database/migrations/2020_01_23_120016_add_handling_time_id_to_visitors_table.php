<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHandlingTimeIdToVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->bigInteger('handling_time_id')->after('user_id')->unsigned()->nullable();
            $table->foreign('handling_time_id')->references('id')->on('handling_times')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table->dropForeign(['handling_time_id']);
            $table->dropColumn('handling_time_id');
        });
    }
}
