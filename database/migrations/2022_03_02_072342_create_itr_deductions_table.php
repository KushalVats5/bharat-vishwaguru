<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItrDeductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_deductions', function (Blueprint $table) {
            $table->id();
            $table->decimal('sec80c_lic_premium')->nullable()->default(0);
            $table->decimal('sec80c_pf')->nullable()->default(0);
            $table->decimal('sec80c_ppf')->nullable()->default(0);
            $table->decimal('sec80c_housing_loan_repayment')->nullable()->default(0);
            $table->decimal('sec80c_fdr')->nullable()->default(0);
            $table->decimal('sec80c_nsc')->nullable()->default(0);
            $table->decimal('sec80c_tuition_fee')->nullable()->default(0);
            $table->decimal('sec80c_paid_to_annuity')->nullable()->default(0);
            $table->decimal('sec80c_other_deductions')->nullable()->default(0);

            $table->text('sec80d_deductions')->nullable(); // will hold data in json format
            $table->text('donations')->nullable(); // will hold data in json format
            $table->text('other_deductions')->nullable(); // will hold data in json format

            $table->string('sec80dd_uu_member')->nullable()->default('');
            $table->decimal('sec80dd_uu_expenditure')->nullable()->default(0);
            $table->string('sec80dd_uu_disability_percentage')->nullable()->default('');

            $table->string('sec80ddb_citizen')->nullable()->default('');
            $table->decimal('sec80ddb_expenditure')->nullable()->default(0);

            $table->decimal('sec80e_int_on_edu_loan')->nullable()->default(0);

            $table->decimal('sec80gg_rent_paid')->nullable()->default(0);
            $table->decimal('sec80gg_num_of_months')->nullable()->default(0);

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
        Schema::dropIfExists('itr_deductions');
    }
}