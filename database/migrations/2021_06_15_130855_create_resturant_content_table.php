<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturant_content', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->longText('aboutus_content')->nullable();
            $table->string('chef_signature')->nullable();
            $table->longText('chef_content')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('landline_content')->nullable();
            $table->string('mobile_content')->nullable();
            $table->string('email_content')->nullable();
            $table->string('logoImg')->nullable();
            $table->string('bannerImg')->nullable();
            $table->string('aboutusImg')->nullable();
            $table->longText('address_content')->nullable();
            $table->string('resturant_profile_id')->nullable();
            $table->string('status')->nullable();
            $table->string('admin_status')->nullable();
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
        Schema::dropIfExists('resturant_content');
    }
}
