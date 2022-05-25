<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItrReturnFileTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_return_file_types', function (Blueprint $table) {
            $table->id();

            $table->boolean('is_revised_return')->default(0);
            $table->string('original_itr_ack_num')->nullable()->default(0);
            $table->date('original_itr_file_date')->nullable();

            $table->boolean('is_under_seventh_provison')->default(0);
            $table->decimal('deposite_amount_more_than_1cr')->nullable()->default(0);
            $table->decimal('travel_expenditure_more_than_2lk')->nullable()->default(0);
            $table->decimal('electricity_expenditure_more_than_1lk')->nullable()->default(0);

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
        Schema::dropIfExists('itr_return_file_types');
    }
}