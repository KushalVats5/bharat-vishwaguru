<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstFilingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_filings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gst_info_id')->default(0); // for now gst_infos id
            $table->bigInteger('service_plan_id')->default(0); // for now service plan id
            $table->enum('month', ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', ''])->default('');
            $table->string('financial_year')->default('');
            $table->string('sales_bills')->default('');
            $table->string('purchase_bills')->default('');
            $table->string('json_bills')->default('');
            $table->boolean('is_json_bills')->default(0);
            $table->boolean('is_file_nill')->default(0);
            $table->string('gstr1_doc')->default('');
            $table->string('gstr3b_doc')->default('');
            $table->string('tax_computation_doc')->default('');
            $table->string('gst_challan_doc')->default('');
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
        Schema::dropIfExists('gst_filings');
    }
}