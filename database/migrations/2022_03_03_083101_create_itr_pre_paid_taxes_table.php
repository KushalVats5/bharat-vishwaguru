<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItrPrePaidTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_pre_paid_taxes', function (Blueprint $table) {
            $table->id();

            $table->boolean('is_self_assesment_tax_payment')->default(0);
            $table->text('self_assesment_tax_payment')->nullable(); // will hold data in json format

            $table->boolean('is_tds_paid_other_than_salary')->default(0);
            $table->text('tds_paid_other_than_salary')->nullable(); // will hold data in json format

            $table->boolean('is_tds_paid_on_rental_income')->default(0);
            $table->text('tds_paid_on_rental_income')->nullable(); // will hold data in json format

            $table->boolean('is_tax_collected_at_source')->default(0);
            $table->text('tax_collected_at_source')->nullable(); // will hold data in json format

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
        Schema::dropIfExists('itr_pre_paid_taxes');
    }
}