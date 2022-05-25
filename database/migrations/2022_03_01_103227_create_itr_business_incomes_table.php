<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItrBusinessIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_business_incomes', function (Blueprint $table) {
            $table->id();
            /// PRESUMPTIVE BUSINESS INCOME
            $table->text('presumptive_business_income')->nullable(); // will hold multi row data in json format
            $table->boolean('financial_particular_on_31_march')->default(0);

            $table->decimal('fixed_assets')->nullable()->default(0);
            $table->decimal('stock_in_trade')->nullable()->default(0);
            $table->decimal('balance_with_banks')->nullable()->default(0);
            $table->decimal('cash_balance')->nullable()->default(0);
            $table->decimal('sundry_debtors')->nullable()->default(0);
            $table->decimal('loans_and_advances')->nullable()->default(0);
            $table->decimal('other_assets')->nullable()->default(0);

            $table->decimal('members_own_capital')->nullable()->default(0);
            $table->decimal('secured_loans')->nullable()->default(0);
            $table->decimal('unsecured_loans')->nullable()->default(0);
            $table->decimal('advances')->nullable()->default(0);
            $table->decimal('sundry_creditors')->nullable()->default(0);
            $table->decimal('other_liabilities')->nullable()->default(0);

            $table->string('gstin')->nullable()->default('');
            $table->decimal('turnover_as_per_gst_return')->nullable()->default(0);

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
        Schema::dropIfExists('itr_business_incomes');
    }
}