<?php

use App\Feature;
use App\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(PermissionSeed::class);
        // $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        // $this->call(PermissionsDemoSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(features::class);
        $this->call(plans::class);
        $this->call(ServicesSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(OurTeamSeeder::class);
    }
}