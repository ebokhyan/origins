<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGuides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_order')->default(0);
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->text('similar')->nullable();
            $table->enum('published',[0,1])->default(0);
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_image')->nullable();
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
        Schema::dropIfExists('guides');
    }
}
