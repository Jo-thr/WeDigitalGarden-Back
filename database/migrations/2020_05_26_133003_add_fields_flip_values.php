<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsFlipValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('framework_values', function (Blueprint $table) {
            $table->string('title_flip', 255)->nullable();
            $table->text('resume_flip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('framework_values', function (Blueprint $table) {
            $table->dropColumn('title_flip');
            $table->dropColumn('resume_flip');
        });
    }
}
