<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDirectionIdToHandlingTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('handling_tickets', function (Blueprint $table) {
            $table->bigInteger('direction_id')->unsigned()->nullable();
            $table->foreign('direction_id')->references('id')->on('directions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('handling_tickets', function (Blueprint $table) {
            $table->dropForeign(['direction_id']);
            $table->dropColumn('direction_id');
        });
    }
}
