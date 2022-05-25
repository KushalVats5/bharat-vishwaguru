<?php

use App\Plan;
use App\Plan_Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class plans extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = new Plan();
        $plan->title = 'Self Employed';
        $plan->description = 'self-employed';
        $plan->slug = Str::slug($plan->title);
        $plan->total_cost = 15;
        $plan->save();


        $combine = new Plan_Feature();
        $combine->plan_id = 1;
        $combine->feature_id = 1;
        $combine->save();

        $combine1 = new Plan_Feature();
        $combine1->plan_id = 1;
        $combine1->feature_id = 2;
        $combine1->save();

        $combine2 = new Plan_Feature();
        $combine2->plan_id = 1;
        $combine2->feature_id = 3;
        $combine2->save();

        $plan2 = new Plan();
        $plan2->title = 'Simple Start';
        $plan2->description = 'Simple Start';
        $plan2->slug = Str::slug($plan->title);
        $plan2->total_cost = 20;
        $plan2->save();


        $combine3 = new Plan_Feature();
        $combine3->plan_id = 2;
        $combine3->feature_id = 1;
        $combine3->save();

        $combine4 = new Plan_Feature();
        $combine4->plan_id = 2;
        $combine4->feature_id = 2;
        $combine4->save();

        $combine5 = new Plan_Feature();
        $combine5->plan_id = 2;
        $combine5->feature_id = 3;
        $combine5->save();

        $combine6 = new Plan_Feature();
        $combine6->plan_id = 2;
        $combine6->feature_id = 4;
        $combine6->save();


        $plan3 = new Plan();
        $plan3->title = 'Essentials';
        $plan3->description = 'Essentials';
        $plan3->slug = Str::slug($plan->title);
        $plan3->total_cost = 25;
        $plan3->save();

        $combine7 = new Plan_Feature();
        $combine7->plan_id = 3;
        $combine7->feature_id = 1;
        $combine7->save();

        $combine8 = new Plan_Feature();
        $combine8->plan_id = 3;
        $combine8->feature_id = 2;
        $combine8->save();

        $combine9 = new Plan_Feature();
        $combine9->plan_id = 3;
        $combine9->feature_id = 3;
        $combine9->save();

        $combine10 = new Plan_Feature();
        $combine10->plan_id = 3;
        $combine10->feature_id = 4;
        $combine10->save();

        $combine11 = new Plan_Feature();
        $combine11->plan_id = 3;
        $combine11->feature_id = 5;
        $combine11->save();

        $plan4 = new Plan();
        $plan4->title = 'Plus';
        $plan4->description = 'Plus';
        $plan4->slug = Str::slug($plan->title);
        $plan4->total_cost = 30;
        $plan4->save();


        $combine12 = new Plan_Feature();
        $combine12->plan_id = 4;
        $combine12->feature_id = 1;
        $combine12->save();

        $combine13 = new Plan_Feature();
        $combine13->plan_id = 4;
        $combine13->feature_id = 2;
        $combine13->save();

        $combine14 = new Plan_Feature();
        $combine14->plan_id = 4;
        $combine14->feature_id = 3;
        $combine14->save();

        $combine15 = new Plan_Feature();
        $combine15->plan_id = 4;
        $combine15->feature_id = 4;
        $combine15->save();

        $combine16 = new Plan_Feature();
        $combine16->plan_id = 4;
        $combine16->feature_id = 5;
        $combine16->save();

        $combine17 = new Plan_Feature();
        $combine17->plan_id = 4;
        $combine17->feature_id = 6;
        $combine17->save();



    }
}
