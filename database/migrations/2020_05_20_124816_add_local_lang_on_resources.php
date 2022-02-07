<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use OptimistDigital\MenuBuilder\MenuBuilder;

class AddLocalLangOnResources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expertises', function ($table) {
            $table->string('locale')->nullable();
            $table->bigInteger('locale_parent_id')->nullable();
        });

        Schema::table('use_cases', function ($table) {
            $table->string('locale')->nullable();
            $table->bigInteger('locale_parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expertises', function ($table) {
            $table->dropColumn('locale');
            $table->dropColumn('locale_parent_id');
        });

        Schema::table('use_cases', function ($table) {
            $table->dropColumn('locale');
            $table->dropColumn('locale_parent_id');
        });
    }
}
