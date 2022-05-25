<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique()->nullable();
            $table->longText('sub_heading')->nullable();
            $table->longText('meta_key')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('content')->nullable();
            $table->longText('service_image')->nullable();
            $table->string('price')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('services');
    }
}
