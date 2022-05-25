<?php

use App\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new Service();
        $service->title = 'Income Tax Return';
        $service->price = 599;
        $service->slug = Str::slug($service->title);
        $service->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service->save();

        $service1 = new Service();
        $service1->title = 'Bussiness Tax File';
        $service1->price = 749;
        $service1->slug = Str::slug($service1->title);
        $service1->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service1->save();

        $service2 = new Service();
        $service2->title = "Professional's Tax File";
        $service2->price = 2499;
        $service2->slug = Str::slug($service2->title);
        $service2->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service2->save();

        $service3 = new Service();
        $service3->title = 'Bussiness Tax Return';
        $service3->price = 5000;
        $service3->slug = Str::slug($service3->title);
        $service3->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service3->save();

        $service4 = new Service();
        $service4->title = 'Accounting';
        $service4->price = 899;
        $service4->slug = Str::slug($service4->title);
        $service4->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service4->save();

        $service5 = new Service();
        $service5->title = 'Digital Signature Certificate';
        $service5->price = 12500;
        $service5->slug = Str::slug($service5->title);
        $service5->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service5->save();

        $service6 = new Service();
        $service6->title = 'Company Registration fee';
        $service6->price = 999;
        $service6->slug = Str::slug($service6->title);
        $service6->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service6->save();

        $service7 = new Service();
        $service7->title = 'GST Registration';
        $service7->price = 999;
        $service7->slug = Str::slug($service7->title);
        $service7->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service7->save();

        $service8 = new Service();
        $service8->title = 'File GST Return';
        $service8->price = 999;
        $service8->slug = Str::slug($service8->title);
        $service8->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service8->save();

        $service9 = new Service();
        $service9->title = 'MSME Registration';
        $service9->price = 599;
        $service9->slug = Str::slug($service9->title);
        $service9->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service9->save();

        $service10 = new Service();
        $service10->title = 'Pen card';
        $service10->price = 250;
        $service10->slug = Str::slug($service10->title);
        $service10->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service10->save();

        $service11 = new Service();
        $service11->title = 'File TDS Return';
        $service11->price = 1499;
        $service11->slug = Str::slug($service11->title);
        $service11->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service11->save();

        $service12 = new Service();
        $service12->title = 'PF/ES Registration';
        $service12->price = 5999;
        $service12->slug = Str::slug($service12->title);
        $service12->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco";
        $service12->save();

    }
}
