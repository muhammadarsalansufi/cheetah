<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_name')->nullable();
            $table->string('order_contact')->nullable();
            $table->string('order_address')->nullable();
            $table->string('order_id')->nullable();
            $table->string('restaurant_id')->nullable();
            $table->string('food_array')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('rider_status')->nullable();
            $table->string('rider_id')->nullable();
            $table->string('total_bill')->nullable();
            $table->string('order_time')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('delivery_status')->nullable();
            $table->string('kitchen_status')->nullable();
            $table->string('status')->nullable();
            $table->string('order_zip')->nullable();
            $table->string('rider_latitude')->nullable();
            $table->string('rider_longitude')->nullable();
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
        Schema::dropIfExists('food_orders');
    }
}
