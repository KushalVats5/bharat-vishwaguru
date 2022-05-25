<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique()->nullable();
            $table->integer('user_id')->nullable();
            $table->string('post_type')->nullable();
            $table->longText('sub_heading')->nullable();
            $table->longText('meta_key')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('content')->nullable();
            $table->longText('article_image')->nullable();
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
        Schema::dropIfExists('articles');
    }
}