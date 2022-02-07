<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrameworkValeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('framework_values', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('logo', 255)->nullable();
            $table->text('resume')->nullable();
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
        Schema::dropIfExists('framework_values');
    }
}
