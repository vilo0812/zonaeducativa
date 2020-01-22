<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHandlingFloorIdToHandlingTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('handling_tickets', function (Blueprint $table) {
            $table->bigInteger('handling_floors_id')->unsigned()->nullable();
            $table->foreign('handling_floors_id')->references('id')->on('handling_floors')->onDelete('cascade');
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
           $table->dropForeign(['handling_floors_id']);
            $table->dropColumn('handling_floors_id');
        });
    }
}
