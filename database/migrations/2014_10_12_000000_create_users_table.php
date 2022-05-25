<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('is_active')->nullable();
            $table->string('dob')->nullable();
            $table->string('mobile')->nullable()->unique();
            $table->string('father_name')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('pan')->nullable();
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('attached_certificate')->nullable();
            $table->string('bank_no')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('cancel_cheque')->nullable();
            $table->string('avatar')->nullable();
            $table->string('role')->nullable();
            $table->string('flat')->nullable();
            $table->string('premises')->nullable();
            $table->string('road_no')->nullable();
            $table->string('area')->nullable();
            $table->string('distic')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('education_certificate')->nullable();
            $table->string('resume')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
