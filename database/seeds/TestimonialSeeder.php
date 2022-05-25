<?php

use App\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonial1 = new Testimonial();
        $testimonial1->title = 'first';
        $testimonial1->name = 'kim';
        $testimonial1->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $testimonial1->save();

        $testimonial2 = new Testimonial();
        $testimonial2->title = 'second';
        $testimonial2->name = 'tim';
        $testimonial2->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $testimonial2->save();
    }
}
