<?php

use App\OurTeam as AppOurTeam;
use Illuminate\Database\Seeder;

class OurTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new = new AppOurTeam();
        $new->name = 'kamal Singh';
        $new->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever ";
        $new->save();

        $new1 = new AppOurTeam();
        $new1->name = 'Rocket Singh';
        $new1->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever ";
        $new1->save(); 
        
        $new2 = new AppOurTeam();
        $new2->name = 'Ramesh Kumar';
        $new2->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever ";
        $new2->save();

        $new3 = new AppOurTeam();
        $new3->name = 'Ravi Kumar';
        $new3->content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever ";
        $new3->save();
    }
}
