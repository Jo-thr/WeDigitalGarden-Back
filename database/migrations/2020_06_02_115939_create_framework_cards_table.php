<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrameworkCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('framework_certification', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('subtitle', 255)->nullable();
            $table->integer('level')->nullable();
            $table->string('picture', 255)->nullable();
            $table->string('color', 255)->nullable();
            $table->string('who', 255)->nullable();
            $table->string('what', 255)->nullable();
            $table->string('how', 255)->nullable();

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
        Schema::dropIfExists('framework_certification');
    }
}
