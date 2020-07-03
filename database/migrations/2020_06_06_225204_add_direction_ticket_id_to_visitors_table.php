<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDirectionTicketIdToVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitors', function (Blueprint $table) {
           $table->bigInteger('direction_ticket_id')->after('handling_time_id')->unsigned()->nullable();
            $table->foreign('direction_ticket_id')->references('id')->on('direction_tickets')->onDelete('cascade');
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
            $table->dropForeign(['direction_ticket_id']);
            $table->dropColumn('direction_ticket_id');
        });
    }
}
