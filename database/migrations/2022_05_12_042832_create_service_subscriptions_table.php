<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id')->default(0); /// for now GST_info id
            $table->bigInteger('service_plan_id')->default(0); // for now service_plan id
            $table->enum('payment_status', ['Success', 'Aborted', 'Failure', 'Unknown'])->default('Unknown');
            $table->string('transaction_id')->default('');
            $table->string('order_id')->default('');
            $table->string('tracking_id')->default('');
            $table->string('payment_mode')->default('');
            $table->string('currency')->default('');
            $table->decimal('amount')->default(0);
            $table->string('billing_name')->default('');
            $table->string('billing_address')->default('');
            $table->string('billing_city')->default('');
            $table->string('billing_state')->default('');
            $table->string('billing_zipcode')->default('');
            $table->datetime('txn_date')->nullable();
            $table->string('response_code')->default('');
            //$table->string('response_code')->default('');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->bigInteger('user_id')->default(0);
            $table->string('plan_duration')->default('');
            $table->string('plan_duration_unit')->default('');
            $table->decimal('plan_price')->default(0);
            $table->string('service_type')->default('');
            $table->string('financial_year')->default('');
            $table->string('financial_year_quarter')->default('');
            $table->string('retrun_to_be_file_from')->default('');
            $table->text('valadity_of_plan_package')->nullable();

            /* $table->bigInteger('city')->default(0);
            $table->boolean('is_active')->default(1);
            $table->enum('duration_unit', ['once', 'month(s)', 'year(s)'])->default('once');
            $table->decimal('price')->default(0);
            $table->text('description')->nullable(); */

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
        Schema::dropIfExists('service_subscriptions');
    }
}