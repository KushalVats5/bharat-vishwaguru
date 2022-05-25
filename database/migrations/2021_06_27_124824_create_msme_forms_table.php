<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsmeFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msme_forms', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('aadharName')->nullable();
            $table->string('applicantName')->nullable();
            $table->string('socialCategory')->nullable();
            $table->string('typeOfOrganistation')->nullable();
            $table->string('businessName')->nullable();
            $table->string('date')->nullable();
            $table->string('mobileNo')->nullable();
            $table->string('email')->nullable();
            $table->string('bankAccountNo')->nullable();
            $table->string('ifscCode')->nullable();
            $table->string('additionalBusiness')->nullable();

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
        Schema::dropIfExists('msme_forms');
    }
}
