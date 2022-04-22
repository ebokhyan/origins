<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeColumnTbls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('resource_type')->default('feature')->nullable();
        });
        Schema::table('news', function (Blueprint $table) {
            $table->string('resource_type')->default('news')->nullable();
        });
        Schema::table('recipes', function (Blueprint $table) {
            $table->string('resource_type')->default('recipe')->nullable();
        });
        Schema::table('guides', function (Blueprint $table) {
            $table->string('resource_type')->default('guide')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('resource_type');
        });
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('resource_type');
        });
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn('resource_type');
        });
        Schema::table('guides', function (Blueprint $table) {
            $table->dropColumn('resource_type');
        });
    }
}
