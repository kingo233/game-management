<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersChargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_charge', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->biginteger('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users');
            $table->integer('money')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_charge');
    }
}
