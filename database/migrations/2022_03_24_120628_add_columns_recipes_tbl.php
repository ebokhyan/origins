<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsRecipesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->longText('description')->nullable()->after('short_description');
            $table->integer('saves')->nullable()->after('description');
            $table->text('cooks_in')->nullable()->after('saves');
            $table->text('difficulty')->nullable()->after('cooks_in');
            $table->text('type')->nullable()->after('difficulty');
            $table->longText('ingredients')->nullable()->after('type');
            $table->longText('instruction')->nullable()->after('ingredients');
            $table->longText('instruction_image')->nullable()->after('instruction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            //
        });
    }
}
