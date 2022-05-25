<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeTaxReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_tax_returns', function (Blueprint $table) {
            $table->id();
            $table->string('pancard')->nullable();
            $table->string('name')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('status')->nullable();
            $table->string('form1616a_done')->nullable();
            $table->string('other_document_done')->nullable();
            $table->string('dob')->nullable();
            $table->string('father_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('flat_no')->nullable();
            $table->string('name_of_premises')->nullable();
            $table->string('road')->nullable();

            $table->string('area')->nullable();
            $table->string('town')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('mobile_no')->nullable();

            $table->string('email_address')->nullable();
            $table->string('residential_status')->nullable();
            $table->longText('ifsc_code')->nullable();
            $table->longText('bank_name')->nullable();
            $table->longText('account_number')->nullable();
            $table->string('tick_account_for_refund')->nullable();

            $table->string('employer_category')->nullable();
            $table->string('filing_status')->nullable();
            $table->string('original_acknowledgement_no')->nullable();
            $table->string('date_of_filling_of_original_return')->nullable();
            $table->string('notice_no')->nullable();
            $table->longText('comment')->nullable();
            $table->string('upload_form_1616a')->nullable();
            $table->string('efilling_password')->nullable();
            $table->string('other_document')->nullable();
            $table->string('user_id')->nullable();

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
        Schema::dropIfExists('income_tax_returns');
    }
}
