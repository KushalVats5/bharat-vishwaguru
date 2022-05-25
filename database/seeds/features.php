<?php

use App\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class features extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feature = new Feature();
        $feature->title = 'Seperate business/personal';
        $feature->price = 5;
        $feature->slug = Str::slug($feature->title);
        $feature->save();

        $feature1 = new Feature();
        $feature1->title = 'Create invoices & estimates';
        $feature1->price = 5;
        $feature1->slug = Str::slug($feature->title);
        $feature1->save();

        $feature2 = new Feature();
        $feature2->title = 'Multi-device';
        $feature2->price = 5;
        $feature2->slug = Str::slug($feature->title);
        $feature2->save();

        $feature3 = new Feature();
        $feature3->title = 'Estimate tax payments';
        $feature3->price = 5;
        $feature3->slug = Str::slug($feature->title);
        $feature3->save();

        $feature4 = new Feature();
        $feature4->title = 'Track deductible mileage';
        $feature4->price = 5;
        $feature4->slug = Str::slug($feature->title);
        $feature4->save();

        $feature5 = new Feature();
        $feature5->title = 'Download online banking';
        $feature5->price = 5;
        $feature5->slug = Str::slug($feature->title);
        $feature5->save();


    }
}
