<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
            $table->integer('attack')->unsigned()->default(0);
            $table->integer('defend')->unsigned()->default(0);
            $table->integer('critical_hit')->unsigned()->default(0);
            $table->integer('critical_damage')->unsigned()->default(0);
            $table->string('skill', 50)->nullable()->default('unkown skill');
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
        Schema::dropIfExists('weapons');
    }
}
