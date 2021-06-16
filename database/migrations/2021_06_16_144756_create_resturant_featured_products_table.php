<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResturantFeaturedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturant_featured_products', function (Blueprint $table) {
            $table->id();
            $table->longText('feature_dish1')->nullable();
            $table->string('featureDishPrice1')->nullable();
            $table->string('featureDish1Img')->nullable();
            $table->longText('feature_dish2')->nullable();
            $table->string('featureDishPrice2')->nullable();
            $table->string('featureDish2Img')->nullable();
            $table->longText('feature_dish3')->nullable();
            $table->string('featureDishPrice3')->nullable();
            $table->string('featureDish3Img')->nullable();
            $table->string('status')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('resturant_featured_products');
    }
}
