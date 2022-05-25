<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurteamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ourteam', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('sub_heading')->nullable();
            $table->longText('content')->nullable();
            $table->longText('featured_image')->nullable();

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
        Schema::dropIfExists('ourteam');
    }
}
