<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoWhoCertication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('framework_certification', function (Blueprint $table) {
            $table->renameColumn('what', 'what_1');
            $table->string('what_2', 255)->nullable();
            $table->string('what_3', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('framework_certification', function (Blueprint $table) {
            $table->renameColumn('what_1', 'what');
            $table->dropColumn('what_2');
            $table->dropColumn('what_3');
        });
    }
}
