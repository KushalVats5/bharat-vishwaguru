<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItrSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_sources', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->default('0');
            $table->string('income_sources')->nullable();
            $table->string('form_16')->nullable();
            $table->string('financial_year')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('aadhar_number')->nullable();
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
        Schema::dropIfExists('itr_sources');
    }
}