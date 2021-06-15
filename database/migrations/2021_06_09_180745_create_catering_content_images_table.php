<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateringContentImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catering_content_images', function (Blueprint $table) {
            $table->id();
            $table->string('logoImg')->nullable();
            $table->string('company_title')->nullable();
            $table->longText('banner_content')->nullable();
            $table->string('bannerImg')->nullable();
            $table->longText('aboutus_content')->nullable();
            $table->string('aboutusImg')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('landline_content')->nullable();
            $table->string('mobile_content')->nullable();
            $table->string('email_content')->nullable();
            $table->string('address_content')->nullable();
            $table->longText('vision_content')->nullable();
            $table->string('monday_friday')->nullable();
            $table->string('saturday')->nullable();
            $table->string('sunday')->nullable();
            $table->string('gallery1Img')->nullable();
            $table->string('gallery2Img')->nullable();
            $table->string('gallery3Img')->nullable();
            $table->string('gallery4Img')->nullable();
            $table->string('gallery5Img')->nullable();
            $table->string('gallery6Img')->nullable();
            $table->string('status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('caterory_id')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('admin_status')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('catering_content_images');
    }
}
