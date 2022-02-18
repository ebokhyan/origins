<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSubscriptionsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('unique_email_id')->after('email')->nullable();
            $table->string('list_id')->after('unique_email_id')->nullable();
            $table->string('status')->after('list_id')->nullable();
            $table->string('web_id')->after('status')->nullable();
            $table->string('contact_id')->after('web_id')->nullable();
            $table->string('verify_token')->after('contact_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            //
        });
    }
}
