<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formules', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->nullable();
            $table->bigInteger('locale_parent_id')->nullable();
            $table->string('title', 255);
            $table->string('subtitle', 255);
            $table->integer('price');
            $table->boolean('option_1')->default(0);
            $table->boolean('option_2')->default(0);
            $table->boolean('option_3')->default(0);
            $table->boolean('option_4')->default(0);
            $table->boolean('option_5')->default(0);
            $table->boolean('option_6')->default(0);
            $table->boolean('option_7')->default(0);
            $table->boolean('option_8')->default(0);
            $table->boolean('option_9')->default(0);
            $table->boolean('option_10')->default(0);
            $table->boolean('option_11')->default(0);
            $table->boolean('option_12')->default(0);
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('formules');
    }
}
