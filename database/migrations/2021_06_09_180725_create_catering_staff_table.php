<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateringStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catering_staff', function (Blueprint $table) {
            $table->id();
            $table->string('catering_provider_id')->nullable();
            $table->string('staff_name')->nullable();
            $table->string('staff_designation')->nullable();
            $table->string('staffImg')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('catering_staff');
    }
}
