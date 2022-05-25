<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItrEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_employments', function (Blueprint $table) {
            $table->id();

            $table->decimal('salary_income_annual')->nullable()->default(0);
            $table->decimal('value_of_perquisites')->nullable()->default(0);
            $table->decimal('profit_in_lieu_of_salary')->nullable()->default(0);

            $table->decimal('house_rent_allowance')->nullable()->default(0);
            $table->decimal('leave_travel_concession')->nullable()->default(0);
            $table->decimal('gratuity')->nullable()->default(0);
            $table->text('other_allowances')->nullable();
            $table->decimal('net_salary')->nullable()->default(0);

            $table->decimal('standard_deduction')->nullable()->default(0);
            $table->decimal('entertainment_allowance')->nullable()->default(0);
            $table->decimal('professional_tax')->nullable()->default(0);

            $table->string('employer_name')->nullable()->default('');
            $table->decimal('tds_deduction')->nullable()->default(0);
            $table->string('TAN_of_employer')->nullable()->default('');

            $table->bigInteger('itr_sources_id')->default('0');
            $table->timestamps();
            /*
        salary_income_annual
        value_of_perquisites
        profit_in_lieu_of_salary

        house_rent_allowance
        leave_travel_concession
        gratuity
        other_allowances [key:value pair json data]

        net_salary

        standard_deduction
        entertainment_allowance
        professional_tax

        employer_name
        tds_deduction
        TAN_of_employer

         */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itr_employments');
    }
}