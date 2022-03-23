<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNewsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->text('author')->after('slug')->nullable();
            $table->string('photographer')->after('author')->nullable();
            $table->string('translator')->after('photographer')->nullable();
            $table->text('short_description')->after('image')->nullable();
            $table->longText('description')->after('short_description')->nullable();
            $table->enum('top',['0','1'])->after('description')->default('0');
            $table->text('similar')->after('top')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
}
