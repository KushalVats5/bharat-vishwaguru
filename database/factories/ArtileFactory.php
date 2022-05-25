<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Article::class, function (\Faker\Generator $faker) {
    $title = $faker->sentence(2);
    return [
        'title'             => $title,
        'slug'              => Str::slug($title),
        'user_id'      => 1,
        'sub_heading'    => $faker->paragraph(1),
        'meta_key'             => $faker->paragraph(1),
        'short_description'              => $faker->paragraph(1),
        'meta_description'      => $faker->paragraph(1),
        'content'      => $faker->paragraph(4),
    ];
});