<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
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

$factory->define(Page::class, function (\Faker\Generator $faker) {
    $title = $faker->sentence(2);
    return [
        'title'             => $title,
        'slug'              => Str::slug($title),
        'sub_heading'      => $faker->paragraph(1),
        'meta_key'      => $faker->paragraph(1),
        'short_description'  => $faker->paragraph(2),
        'meta_description'   => $faker->paragraph(2),
        'content'      => $faker->paragraph(5),
        'page_image'   => 'storage/default/default.png',
    

    ];
});