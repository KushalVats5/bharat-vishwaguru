<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default('');
            $table->morphs('jobable');
            $table->bigInteger('user_id')->default('0'); // id of the user who created the job.
            $table->enum('status', ['created', 'open', 'in progress', 're-check', 'hold', 'completed'])->default('created');
            $table->bigInteger('assigned_to')->default('0');
            $table->bigInteger('assigned_by')->default('0');
            $table->text('description')->nullable();
            $table->decimal('price')->default(0);
            $table->enum('price_type', ['fixed', 'percentage'])->default('percentage');
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
        Schema::dropIfExists('jobs');
    }
}