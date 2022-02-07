<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleInUseCase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('use_cases', function (Blueprint $table)  {
            $table->string('name', 255)->nullable();
            $table->string('background_color', 255)->nullable();
            $table->string('title_article', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('subtitle_1', 255)->nullable();
            $table->string('subtitle_2', 255)->nullable();
            $table->string('subtitle_3', 255)->nullable();
            $table->text('paragraph_1')->nullable();
            $table->text('paragraph_2')->nullable();
            $table->text('paragraph_3')->nullable();
            $table->string('title_satisfaction', 255)->nullable();
            $table->string('section_color', 255)->nullable();
            $table->text('comment')->nullable();
            $table->string('auteur', 255)->nullable();
            $table->string('poste_auteur', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('use_cases', function (Blueprint $table) {
            $table->dropColumn('poste_auteur');
            $table->dropColumn('auteur');
            $table->dropColumn('comment');
            $table->dropColumn('section_color');
            $table->dropColumn('title_satisfaction');
            $table->dropColumn('paragraph_3');
            $table->dropColumn('paragraph_2');
            $table->dropColumn('paragraph_1');
            $table->dropColumn('subtitle_3');
            $table->dropColumn('subtitle_2');
            $table->dropColumn('subtitle_1');
            $table->dropColumn('description');
            $table->dropColumn('title_article');
            $table->dropColumn('background_color');
            $table->dropColumn('name');
        });
    }
}
