<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItrBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_bank_details', function (Blueprint $table) {
            $table->id();
            $table->text('bank_info')->nullable(); // will hold data in json format
            $table->string('aadhar_info')->nullable()->default('');
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
        Schema::dropIfExists('itr_bank_details');
    }
}