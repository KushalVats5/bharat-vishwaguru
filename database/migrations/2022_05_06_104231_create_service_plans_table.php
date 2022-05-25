<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_plans', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default('');
            $table->text('description')->nullable();
            $table->bigInteger('duration')->default(1);
            $table->enum('duration_unit', ['once', 'month(s)', 'year(s)'])->default('once');
            $table->decimal('price')->default(0);
            $table->enum('service_type', ['gst registration', 'gst return file', 'itr file', 'other'])->default('gst return file');
            $table->enum('status', ['active', 'discontinued', 'deactive'])->default('active');
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
        Schema::dropIfExists('service_plans');
    }
}