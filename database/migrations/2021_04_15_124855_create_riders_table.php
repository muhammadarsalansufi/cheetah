<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('license_id')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('vehicle_identity')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('rate')->nullable();
            $table->string('total_order')->nullable();
            $table->string('total_earning')->nullable();
            $table->string('mobile_id')->nullable();
            $table->string('status')->nullable();
            $table->string('email_status')->nullable();
            $table->string('admin_status')->nullable();
            $table->string('documentation_status')->nullable();
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
        Schema::dropIfExists('riders');
    }
}
