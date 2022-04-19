<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnGuides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guides', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->text('cover_image_mobile')->after('cover_image')->nullable();
            $table->text('description_1')->after("short_description")->nullable();
            $table->text('description_2')->after("description_1")->nullable();
            $table->text('description_3')->after("description_2")->nullable();
            $table->text('add_section')->after('description_3')->nullable();
            $table->text('subscription_title')->after('add_section')->nullable();
            $table->text('subscription_text')->after('subscription_title')->nullable();
            $table->text('subscription_image')->after('subscription_text')->nullable();
            $table->text('subscription_image_mob')->after('subscription_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guides', function (Blueprint $table) {
            $table->dropColumn('cover_image_mobile');
            $table->dropColumn('description_1');
            $table->dropColumn('description_2');
            $table->dropColumn('description_3');
            $table->dropColumn('add_section');
            $table->dropColumn('subscription_title');
            $table->dropColumn('subscription_text');
            $table->dropColumn('subscription_image');
            $table->dropColumn('subscription_image_mob');
        });
    }
}
