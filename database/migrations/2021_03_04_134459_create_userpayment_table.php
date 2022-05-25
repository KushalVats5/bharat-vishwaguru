<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userpayment', function (Blueprint $table) {
            $table->id();
             $table->string('user_plan_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('user_plan_name')->nullable();
            $table->string('user_plan_sub_name')->nullable();
            $table->string('is_assigned')->default(0);
            $table->string('financial_year')->nullable();
            $table->string('subscription_start')->nullable();
            $table->string('subscription_end')->nullable();
            $table->string('is_active')->nullable();
            $table->string('is_expired')->default(0);
            $table->string('tracking_id')->nullable();
            $table->string('bank_ref_no')->nullable();
            $table->string('order_status')->nullable();
            $table->string('failure_message')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('card_name')->nullable();
            $table->string('status_code')->nullable();
            $table->string('status_message')->nullable();
            $table->string('currency')->nullable();
            $table->string('amount')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_tel')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('delivery_name')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_state')->nullable();
            $table->string('delivery_zip')->nullable();
            $table->string('delivery_country')->nullable();
            $table->string('delivery_tel')->nullable();
            $table->string('merchant_param1')->nullable();
            $table->string('merchant_param2')->nullable();
            $table->string('merchant_param3')->nullable();
            $table->string('merchant_param4')->nullable();
            $table->string('merchant_param5')->nullable();
            $table->string('vault')->nullable();
            $table->string('offer_type')->nullable();
            $table->string('offer_code')->nullable();
            $table->string('discount_value')->nullable();
            $table->string('mer_amount')->nullable();
            $table->string('eci_value')->nullable();
            $table->string('retry')->nullable();
            $table->string('response_code')->nullable();
            $table->string('billing_notes')->nullable();
            $table->string('trans_date')->nullable();
            $table->string('bin_country')->nullable();       
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
        Schema::dropIfExists('userpayment');
    }
}
