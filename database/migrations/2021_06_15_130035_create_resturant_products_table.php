<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturant_products', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('rest_profile_id')->nullable();
            $table->string('rest_content_id')->nullable();
            $table->string('status')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_type')->nullable();
            $table->integer('quantity')->default(1);
            $table->string('offer')->nullable();
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
        Schema::dropIfExists('resturant_products');
    }
}
