<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItrOtherIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_other_incomes', function (Blueprint $table) {
            $table->id();
            $table->decimal('interest_from_saving_bank_ac')->nullable()->default(0);
            $table->decimal('interest_from_fixed_deposit')->nullable()->default(0);
            $table->decimal('interest_from_income_tax_refund')->nullable()->default(0);
            $table->boolean('receive_family_pension')->nullable()->default(0);
            $table->decimal('family_pension_received')->nullable()->default(0);
            $table->decimal('deduction_under_57iia')->nullable()->default(0);
            $table->decimal('net_family_pension')->nullable()->default(0);

            $table->decimal('any_other_income')->nullable()->default(0);
            $table->boolean('dividend_income')->nullable()->default(0);
            $table->decimal('di_upto_15jun')->nullable()->default(0);
            $table->decimal('di_16jun_to_15sep')->nullable()->default(0);
            $table->decimal('di_16sep_to_15dec')->nullable()->default(0);
            $table->decimal('di_16dec_to_15mar')->nullable()->default(0);
            $table->decimal('di_16mar_to_31mar')->nullable()->default(0);

            $table->boolean('exempted_income_check')->nullable()->default(0);
            $table->text('exempted_income')->nullable(); /// it will hold json data

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
        Schema::dropIfExists('itr_other_incomes');
    }
}