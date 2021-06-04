<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComplaintAndResultToBannedHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banned_history', function (Blueprint $table) {
            //
            $table->string('complaint', 512)->nullable();
            $table->string('result', 512)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banned_history', function (Blueprint $table) {
            //
            $table->dropColumn('complaint');
            $table->dropColumn('result');
        });
    }
}
