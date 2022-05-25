<?php

namespace App\Http\Controllers;

use App\Article;
use App\Article_Category;
use App\Category;
use App\ContactUs;
use App\OurTeam;
use App\Page;
use App\Service;
use App\ServicePlans\SelfEmployed;
use App\Testimonial;
use App\Tracker;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public $user_id;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        if (Auth::check()) {

            $this->user_id = auth()->user()->id;
        }
        // dd($this->user_id, Auth::check());
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //number of user connected or viewed
        Tracker::firstOrCreate(
            [
                'ip' => $_SERVER['REMOTE_ADDR'],
            ],
            [
                'ip' => $_SERVER['REMOTE_ADDR'],
                'current_date' => date('Y-m-d'),
            ]
        )->save();
        $service = Service::paginate(6);
        $service1 = $service->chunk(3);
        $blog = Article::paginate(3);
        $testimonial = Testimonial::paginate(2);
        $ourteam = OurTeam::paginate(4);
        $page = Page::where('slug', 'about-us')->first();
        // return view('static.page');
        return view('welcome', compact('service1', 'blog', 'ourteam', 'testimonial', 'page'));
    }

    /**
     * myAccount
     *
     * @return void
     */
    public function myAccount()
    {

        $data = SelfEmployed::where('user_id', auth()->id())->get();
        return view('home', ['data' => $data]);
    }

    /**
     * staticPage
     *
     * @param  mixed $slug
     * @return void
     */

    public function staticPage($slug = null)
    {
        $content = Page::where('slug', $slug)->first();
        return view('static.page', compact('content'));
    }

    public function dynamicArticle($slug = null)
    {
        $content = Article::where('slug', $slug)->first();
        $articles_desending = Article::orderBy('id', 'DESC')->paginate(5);
        $categories = Category::all();
        $services = Service::all();
        // return view('dynamic.article', compact('content', 'desending'));
        return view('dynamic.article', ['content' => $content, 'categories' => $categories, 'desending' => $articles_desending, 'services' => $services]);
    }

    public function dynamicCategory($slug = null)
    {
        $content = Category::where('slug', $slug)->first();

        DB::connection()->enableQueryLog();
        $query = Article::query();
        if (isset(request()->search) && !empty(request()->search)) {
            $search_text = request()->search;
            $query->where('title', 'LIKE', "%{$search_text}%")
                ->orWhere('short_description', 'LIKE', "%{$search_text}%")
                ->orWhere('meta_description', 'LIKE', "%{$search_text}%")
                ->orWhere('content', 'LIKE', "%{$search_text}%");
        }
        $articles_desending = Article::orderBy('id', 'DESC')->paginate(5);

        $categories = Category::all();
        $blog = Article_Category::where(['category_id' => $content->id])->pluck('article_id');
        $blogs = Article::where(['id' => $blog])->paginate(10);

        return view('dynamic.category', ['content' => $content, 'blogs' => $blogs, 'categories' => $categories, 'desending' => $articles_desending]);
    }

    public function dynamicService($slug = null)
    {
        $content = Service::where(['slug' => $slug])->first();
        return view('dynamic.services', compact('content'));
    }

    //About us func. about--------
    public function about()
    {
        $service = Service::paginate(6);
        $service1 = $service->chunk(3);
        $blog = Article::paginate(3);
        $testimonial = Testimonial::paginate(2);
        $ourteam = OurTeam::paginate(4);
        $content = Page::where('slug', 'about-us')->first();
        return view('menu.aboutus', compact('content', 'service1', 'blog', 'ourteam', 'testimonial'));
    }

    public function blog()
    {
        //DB::connection()->enableQueryLog();
        $services = Service::all();
        $query = Article::query();
        if (isset(request()->search) && !empty(request()->search)) {
            $search_text = request()->search;
            $query->where('title', 'LIKE', "%{$search_text}%")
            // ->orWhere('short_description', 'LIKE', "%{$search_text}%")
            // ->orWhere('meta_description', 'LIKE', "%{$search_text}%")
                ->orWhere('content', 'LIKE', "%{$search_text}%");
        }
        $articles = $query->orderBy('id')->paginate(10);

        $category = Category::all();

        $articles_desending = Article::orderBy('id', 'DESC')->paginate(5);
        //dd($articles_desending);
        return view('menu.blog', ['blogs' => $articles, 'categories' => $category, 'desending' => $articles_desending, 'services' => $services]);
    }

    public function freelancer($slug = null)
    {
        $content = Page::where('slug', 'freelancer')->first();
        return view('menu.freelancer', compact('content'));
    }

    public function privacy_policy($slug = null)
    {
        $content = Page::where('slug', 'privacy-and-policy')->first();
        return view('menu.privacy', compact('content'));
    }

    public function terms_condition($slug = null)
    {
        $content = Page::where('slug', 'terms-and-conditions')->first();
        return view('menu.terms', compact('content'));
    }

    //contact us page functions-----

    public function contactus()
    {
        return view('menu.contactus');
    }

    public function contactus_save(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',

        ];

        $custommessages = [
            'name.required' => "Name is Required",
            'email.required' => 'Email is Required',
            'subject.required' => 'Subject is Required',
            'phone.required' => 'Phone is Required',
            'email.required' => 'Email is Required',

        ];

        $this->validate($request, $rules, $custommessages);

        $messages = new ContactUs();
        $messages->name = $request->name;
        $messages->email = $request->email;
        $messages->subject = $request->subject;
        $messages->phone = $request->phone;
        $messages->message = $request->message;
        $messages->user_id = auth()->id();
        $messages->save();

        // dd($messages);

        $form = [];
        $form['name'] = 'Contact Us';
        // dd($form);

        Mail::send('mail.contactus', ['messages' => $messages], function ($message) use ($messages) {
            $message->sender('taxring@getnada.com', 'Taxring');
            $message->subject('Taxring');
            $message->to($messages->email);
        });

        Mail::send('mail.support', ['messages' => $messages, 'form' => $form], function ($message) use ($messages, $form) {
            $message->sender('taxring@getnada.com', 'Taxring');
            $message->subject('Taxring');
            $message->to('support@taxring.com');
        });

        return redirect()->back()->with('success', 'Successfully submitted. ');
    }

    public function serviceplans(Request $request)
    {
        $requirement = new SelfEmployed();
        $requirement->requirements = $request->requirement;
        $requirement->user_id = auth()->id();
        $requirement->save();
        return redirect()->route('home')->with('success', 'successfully submitted');
    }

    public function services()
    {
        $services = Service::all();
        return view('menu.services', ['services' => $services]);
    }

}