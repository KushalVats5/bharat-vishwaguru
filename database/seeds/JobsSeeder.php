<?php

use App\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::truncate();
        for ($i = 0; $i < 20; $i++) {
            $statuses = ['created', 'open', 'in progress', 'hold', 'completed'];
            $price_types = ['percentage', 'fixed'];
            Job::create([
                'title' => Str::random(20),
                'user_id' => rand(2, 162),
                'jobable_type' => 'gst_filings',
                'jobable_id' => rand(2, 162),
                'status' => $statuses[rand(0, 4)],
                'assigned_to' => rand(2, 99),
                'assigned_by' => rand(2, 99),
                'description' => Str::random(120),
                'price' => rand(1, 50),
                'price_type' => $price_types[rand(0, 1)],
            ]);
            /// php artisan db:seed --class=JobsSeeder
        }

    }
}