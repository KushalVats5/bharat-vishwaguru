<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->title = 'Outdoor';
        $category->slug = Str::slug($category->title);
        $category->save();

        $category1 = new Category();
        $category1->title = 'Indoor';
        $category1->slug = Str::slug($category1->title);
        $category1->save();
        
    }
}
