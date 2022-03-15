<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_order')->default(0);
            $table->text('title')->nullable();
            $table->text('image')->nullable();
            $table->enum('image_position',['left','right'])->default('left')->nullable();
            $table->text('short_description')->nullable();
            $table->text('cta_action')->nullable();
            $table->enum('published',[0,1])->default(0);
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
        Schema::dropIfExists('banners');
    }
}
