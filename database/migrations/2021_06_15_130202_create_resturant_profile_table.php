<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturant_profile', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('restaurant_name')->nullable();
            $table->string('restaurant_email')->nullable();
            $table->string('landline')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('status')->nullable();
            $table->string('email_status')->nullable();
            $table->string('admin_status')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
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
        Schema::dropIfExists('resturant_profile');
    }
}
