<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_infos', function (Blueprint $table) {
            $table->id();
            $table->string('gst_no')->default('');
            $table->string('firm_name')->nullable()->default('');
            $table->string('owner_name')->nullable()->default('');
            $table->string('gst_username')->nullable()->default('');
            $table->string('gst_passcode')->nullable()->default('');
            $table->string('flat_no')->nullable()->default('');
            $table->string('premises')->nullable()->default('');
            $table->string('street')->nullable()->default('');
            $table->string('locality')->nullable()->default('');
            $table->bigInteger('city')->default(0);
            $table->bigInteger('state')->default(0);
            $table->string('zipcode')->default(0);
            $table->string('email_id')->nullable()->default('');
            $table->string('phone_no')->nullable()->default('');
            $table->string('bank_ac_number')->nullable()->default('');
            $table->string('bank_ifsc')->nullable()->default('');
            $table->string('bank_name')->nullable()->default('');
            $table->boolean('is_active')->default(1);
            $table->bigInteger('user_id')->default(0);
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
        Schema::dropIfExists('gst_infos');
    }
}