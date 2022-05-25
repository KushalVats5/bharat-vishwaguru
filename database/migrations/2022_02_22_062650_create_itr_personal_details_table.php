<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItrPersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_personal_details', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_name');
            $table->date('date_of_birth');
            $table->string('phone');
            $table->string('email');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('pincode');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('flat_door_building');
            $table->string('premises_building_village');
            $table->string('road')->nullable();
            $table->string('locality')->nullable();
            $table->enum('employee_category', ['central government', 'public sector unit', 'pensioner', 'private/others', 'not applicable'])->default('not applicable');
            $table->bigInteger('itr_sources_id')->default('0');
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
        Schema::dropIfExists('itr_personal_details');
    }
}