<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_details', function (Blueprint $table) {
            $table->id();
            $table->string('card_number')->nullable();
            $table->string('cvv')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('cate_id')->nullable();
            $table->string('catering_id')->nullable();
            $table->string('restaurant_id')->nullable();
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
        Schema::dropIfExists('account_details');
    }
}
