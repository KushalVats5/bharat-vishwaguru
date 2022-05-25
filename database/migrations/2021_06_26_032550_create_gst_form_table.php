<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_form', function (Blueprint $table) {
            $table->id();
            $table->string('bname')->nullable();
            $table->string('baddress')->nullable();
            $table->string('pincode')->nullable();
            $table->string('state')->nullable();
            $table->string('countrya')->nullable();
            $table->string('district')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('fathername')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('date')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('gst_form');
    }
}
