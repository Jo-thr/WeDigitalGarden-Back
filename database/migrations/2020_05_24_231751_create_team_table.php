<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('drawing', 255)->nullable();
            $table->string('movie', 255)->nullable();
            $table->integer('order')->nullable();
            $table->string('locale')->nullable();
            $table->bigInteger('locale_parent_id')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
