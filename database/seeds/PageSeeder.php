<?php

use App\Http\Helpers\Helper;
use App\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page1 = new Page();
        $page1->title = 'About Us';
        $page1->slug = Str::slug($page1->title);
        //$page1->user_id = auth()->id();
        $page1->sub_heading = 'Taxring IT Solutions Pvt.';
        $page1->meta_key  = 'consectetur adipiscing elit aliqua.';
        $page1->short_description = 'Taxring IT Solutions Pvt. Ltd. is a company which is registered under “Companies Act, 1956”. We are based at New Delhi- the capital of India. We are providing services all over India with a clear focus on providing Enterprise Support Services to its clients.';
        $page1->meta_description = 'Taxring IT Solutions Pvt. Ltd. is a company which is registered under “Companies Act, 1956”. ';
        $page1->content  = 'Taxring offers online preparation and filing of Individual Income Tax Returns (ITR), E-filing of GST Return,TDS Return, Accounting payroll, PAN Card, Digital Signature certificate(DSC), MSME Registration,Labour Licence Registration,Company Registration,Firm Registration,GST Registration,Trademark Licence Registration,Tax and Accounting Support,Employees investment proof verification,Consultancy Services,Procurement Solutions & legally advisory service.

        Taxring has been authorized by the Income Tax department of the Government of India as an e-return intermediary. SSL encryption is used to ensure that your information is highly secure. It is recommended by top employers to their employees for compliance, confidentiality and ease-of-use.
        The company caters to the needs of its clients to ensure that its clients keep pace with the changing times. We aim to add value to your business by providing you with a professional, proactive & flexible service that is tailored to meet your needs now & in the future';
        $page1->save();

        $page2 = new Page();
        $page2->title = 'Privacy and Policy';
        $page2->slug = Str::slug($page2->title);
        //$page2->user_id = auth()->id();
        $page2->sub_heading = 'Lorem ipsum dolor sit amet';
        $page2->meta_key  = 'consectetur adipiscing elit aliqua.';
        $page2->short_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $page2->meta_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
        $page2->content  = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        $page2->save();

        $page3 = new Page();
        $page3->title = 'Terns and Conditions ';
        $page3->slug = Str::slug($page3->title);
        //$page3->user_id = auth()->id();1
        $page3->sub_heading = 'Lorem ipsum dolor sit amet';
        $page3->meta_key  = 'consectetur adipiscing elit aliqua.';
        $page3->short_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $page3->meta_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
        $page3->content  = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        $page3->save();

        $page4 = new Page();
        $page4->title = 'Vision Missions';
        $page4->slug = Str::slug($page4->title);
        //$page4->user_id = auth()->id();
        $page4->sub_heading = 'Lorem ipsum dolor sit amet';
        $page4->meta_key  = 'consectetur adipiscing elit aliqua.';
        $page4->short_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $page4->meta_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
        $page4->content  = 'Vision
        Our Vision is to facilitate our customers by providing concierge services in different areas. We enhancing the quality of life of our customers by providing better work-life balance and enhance the productivity of Professionals and Corporates.
        
        Mission
        Our Mission is to become No. 1 service provider in India consistently and continuously by reaching 5 Lakh customers by the Year 2020.
        
        Why Taxring ?
        The Taxring provides complete Business solution. We believe in enhancing the customer satisfaction by providing best quality work at average cost rate.
        
        Quality Policy
        It is the policy of our company to provide a range of high quality concierge services which meet or exceed the customer requirements by delivering the services on time and every time in a cost effective manner.
        We pledge to achieve this through customer focus, supplier partnership, industry leadership and commitment to continual improvement by involvement and active participation of all levels of management.';
        $page4->save();

        $page5 = new Page();
        $page5->title = 'Freelancer';
        $page5->slug = Str::slug($page5->title);
        //$page5->user_id = auth()->id();
        $page5->sub_heading = 'Lorem ipsum dolor sit amet';
        $page5->meta_key  = 'consectetur adipiscing elit aliqua.';
        $page5->short_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
        $page5->meta_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
        $page5->content  = 'Vision
        Our Vision is to facilitate our customers by providing concierge services in different areas. We enhancing the quality of life of our customers by providing better work-life balance and enhance the productivity of Professionals and Corporates.
        
        Mission
        Our Mission is to become No. 1 service provider in India consistently and continuously by reaching 5 Lakh customers by the Year 2020.
        
        Why Taxring ?
        The Taxring provides complete Business solution. We believe in enhancing the customer satisfaction by providing best quality work at average cost rate.
        
        Quality Policy
        It is the policy of our company to provide a range of high quality concierge services which meet or exceed the customer requirements by delivering the services on time and every time in a cost effective manner.
        We pledge to achieve this through customer focus, supplier partnership, industry leadership and commitment to continual improvement by involvement and active participation of all levels of management.';
        $page5->save();
    }
}
