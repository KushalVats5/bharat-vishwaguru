<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_availabilities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->default(0);
            $table->decimal('mon_hours')->default(0);
            $table->decimal('tue_hours')->default(0);
            $table->decimal('wed_hours')->default(0);
            $table->decimal('thu_hours')->default(0);
            $table->decimal('fri_hours')->default(0);
            $table->decimal('sat_hours')->default(0);
            $table->decimal('sun_hours')->default(0);
            $table->text('notes')->nullable();
            $table->enum('availability', ['Available', 'Busy', 'Not Available', 'Away'])->default('Available');
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
        Schema::dropIfExists('freelancer_availabilities');
    }
}