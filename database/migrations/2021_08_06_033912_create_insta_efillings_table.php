<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstaEfillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insta_efillings', function (Blueprint $table) {
            $table->id();
            $table->string('assign_to')->nullable();
            $table->string('are_you')->nullable();
            $table->string('pancard')->nullable();
            $table->string('income_tax_password')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('father_name')->nullable();

            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('addhar_number')->nullable();
            $table->string('bank_information')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('comment')->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('insta_efillings');
    }
}
