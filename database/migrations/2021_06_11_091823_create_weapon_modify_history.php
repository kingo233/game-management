<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponModifyHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapon_modify_history', function (Blueprint $table) {
            $table->id();
            $table->integer('weapon_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('user_name',100);
            $table->string('detail', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weapon_modify_history');
    }
}
