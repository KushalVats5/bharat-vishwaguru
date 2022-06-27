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
use App\PostView;
use App\UserSaveItems;
use App\LikeDislike;
use Dotenv\Result\Success;
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
        $article = Article::where('post_type', 'article')->with('author')->latest()->take(1)->first();
        $video = Article::where('post_type', 'video')->with('author')->latest()->take(1)->first();
        $latestArticles = Article::where('post_type', 'article')->with('author')->latest()->skip(1)->take(4)->get();
        $moreArticles = Article::with('author')->latest()->skip(1)->take(9)->get();
        // dd($article, $video, $latestArticles);
        // return view('static.page');
        return view('welcome', compact('article', 'video', 'latestArticles', 'moreArticles'));
    }

    /**
     * myAccount
     *
     * @return void
     */
    public function myAccount()
    {

        // $data = SelfEmployed::where('user_id', auth()->id())->get();
        $data = Auth::user();
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
        $moreArticles = Article::with('author')->latest()->take(12)->get();
        return view('static.page', compact('content', 'moreArticles'));
    }
    /**
     * staticPage
     *
     * @param  mixed $slug
     * @return void
     */

    public function searchArticle(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('s');
        $articles = Article::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->orWhere('sub_heading', 'LIKE', "%{$search}%")
            ->orWhere('sub_heading', 'LIKE', "%{$search}%")
            ->orWhere('short_description', 'LIKE', "%{$search}%")
            ->orWhere('meta_key', 'LIKE', "%{$search}%")
            ->orWhere('meta_description', 'LIKE', "%{$search}%")
            ->get();
        return view('static.search-articles', compact('articles'));
    }

    public function dynamicArticle($slug = null)
    {
        $article = Article::where(['slug' => $slug])->with('author', 'comments', 'commentsCounts', 'view_count')->first();
        $postsViews = PostView::where(['user_id' => \Auth::user()->id, 'ip' => \Request::ip()])->first();
        if (!$postsViews) {
            $postsViews = new PostView;
        }
        $postsViews->id_post = $article->id;
        $postsViews->titleslug = $article->slug;
        $postsViews->url = \Request::url();
        $postsViews->session_id = \Request::getSession()->getId();
        $postsViews->user_id = \Auth::user()->id;
        $postsViews->ip = \Request::ip();
        $postsViews->agent = \Request::header('User-Agent');
        $postsViews->save();

        $moreArticles = Article::where(['post_type' => 'article'])->with('author')->latest()->take(12)->get();
        if ($article->post_type == 'video') {
            return redirect()->route('dynamicArticleVideo', $slug);
        }
        return view('dynamic.article', ['article' => $article, 'moreArticles' => $moreArticles, 'commentsCounts' => $article->commentsCounts->count(), 'view_count' => $article->view_count->count()]);
    }
    public function dynamicArticleVideo($slug = null)
    {
        $article = Article::where(['slug' => $slug])->with('author', 'comments', 'commentsCounts', 'view_count')->first();
        $postsViews = PostView::where(['user_id' => \Auth::user()->id, 'ip' => \Request::ip()])->first();
        if (!$postsViews) {
            $postsViews = new PostView;
        }
        $postsViews->id_post = $article->id;
        $postsViews->titleslug = $article->slug;
        $postsViews->url = \Request::url();
        $postsViews->session_id = \Request::getSession()->getId();
        $postsViews->user_id = \Auth::user()->id;
        $postsViews->ip = \Request::ip();
        $postsViews->agent = \Request::header('User-Agent');
        $postsViews->save();

        $moreArticles = Article::where(['post_type' => 'video'])->with('author')->latest()->take(12)->get();
        if ($article->post_type == 'article') {
            return redirect()->route('dynamicArticle', $slug);
        }
        return view('dynamic.video', ['article' => $article, 'moreArticles' => $moreArticles, 'commentsCounts' => $article->commentsCounts->count(), 'view_count' => $article->view_count->count()]);
    }
    public function savedItems($slug = null)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('success', 'Please login');
            $UserSaveItems = UserSaveItems::where('user_id', Auth::user()->id)->get()->pluck('item_ids');
            $ids = explode(',', $UserSaveItems[0]);
            $saveArticles = Article::with('author')->whereIn('id', $ids)
                // ->latest()->take(12)
                ->get();
        } else {
            $saveArticles = [];
        }
        return view('dynamic.save-article', ['saveArticles' => $saveArticles,]);
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
        /* //DB::connection()->enableQueryLog();
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
        return view('menu.blog', ['blogs' => $articles, 'categories' => $category, 'desending' => $articles_desending, 'services' => $services]); */
        $article = Article::where(['post_type' => 'article'])->with('author', 'comments', 'commentsCounts')->orderBy('id', 'DESC')->first();
        $moreArticles = Article::where(['post_type' => 'article'])->with('author')->latest()->take(12)->get();
        return view('dynamic.article', ['article' => $article, 'moreArticles' => $moreArticles, 'commentsCounts' => $article->commentsCounts->count(), 'view_count' => $article->view_count->count()]);
    }
    public function videos()
    {
        $article = Article::where(['post_type' => 'video'])->with('author', 'comments', 'commentsCounts')->orderBy('id', 'DESC')->first();
        $moreArticles = Article::where(['post_type' => 'video'])->with('author')->latest()->take(12)->get();
        return view('dynamic.video', ['article' => $article, 'moreArticles' => $moreArticles, 'commentsCounts' => $article->commentsCounts->count(), 'view_count' => $article->view_count->count()]);
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

    public function ajaxRemoveItems(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'code' => 401,
                'success' => false,
                'message' => 'please login for save',
            ], 401);
        }
        $ids = [];
        $user_id = auth()->id();
        $newString = null;
        $UserSaveItems = UserSaveItems::where('user_id', $user_id)->first();
        $ids = (array)$UserSaveItems->item_ids;
        if (strpos($UserSaveItems->item_ids, ',') !== false) {
            $newString = $this->removeFromString($UserSaveItems->item_ids, $request->id);
        } else {
            if ($UserSaveItems->item_ids == $request->id) {
                $newString = null;
            } else {
                return response()->json([
                    'code' => 500,
                    'success' => false,
                    'message' => 'No item found',
                ], 500);
            }
        }
        // $newString = $this->removeFromString($UserSaveItems->item_ids, $request->id);
        if (!$newString && $newString != null) {
            return response()->json([
                'code' => 500,
                'success' => false,
                'message' => 'No item found',
            ], 500);
        }

        $UserSaveItems->item_ids = $newString;
        if ($UserSaveItems->save()) {
            return response()->json([
                'code' => 200,
                'success' => true,
                'message' => 'Item removed successfully',
            ], 200);
        } else {
            return response()->json([
                'code' => 500,
                'success' => false,
                'message' => 'Unable to remove item',
            ], 500);
        }
    }
    public function ajaxSaveItems(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'code' => 401,
                'success' => false,
                'message' => 'please login for save',
            ], 401);
        }

        $ids = [];
        $user_id = auth()->id();
        $newString = null;
        $UserSaveItems = UserSaveItems::where('user_id', $user_id)
            ->first();
        if ($UserSaveItems) {
            $ids = (array)$UserSaveItems->item_ids;
            $newString = $this->addtoString($UserSaveItems->item_ids, $request->id);
            if (!$newString) {
                return response()->json([
                    'code' => 500,
                    'success' => false,
                    'message' => 'Item already added',
                ], 500);
            }
        } else {
            $UserSaveItems = new UserSaveItems();
            $UserSaveItems->user_id = $user_id;
            $newString = $request->id;
        }
        // dd($newString);
        $UserSaveItems->item_ids = $newString;
        $UserSaveItems->save();
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Item save successfully',
        ], 200);
    }

    function addtoString($str, $item)
    {
        $parts = explode(',', $str);
        if (empty($parts[0])) {
            $parts = [];
        }
        if (in_array($item, $parts)) {
            return false;
        }
        $parts[] = $item;
        $parts = array_unique($parts);
        return implode(',', $parts);
    }
    function removeFromString($str, $item)
    {
        $parts = explode(',', $str);
        if (!in_array($item, $parts)) {
            return false;
        }
        while (($i = array_search($item, $parts)) !== false) {
            unset($parts[$i]);
        }

        return implode(',', $parts);
    }

    // Save Like Or dislike
    function save_likedislike(Request $request)
    {
        $data = LikeDislike::where('ip', $_SERVER['REMOTE_ADDR'])->where('post_id', $request->post)->first();
        $like = null;
        $disLike = null;
        if ($data) {
            $like = $data->like;
            $disLike = $data->dislike;
        } else {
            $data = new LikeDislike;
        }
        $data->post_id = $request->post;
        $data->ip = $_SERVER['REMOTE_ADDR'];
        if ($request->type == 'like') {
            if ($like == 1) {
                return response()->json([
                    'code' => 500,
                    'success' => false,
                    'message' => 'You\'r already like',
                ], 500);
            }
            $data->like = 1;
        } else {
            if ($disLike == 1) {
                return response()->json([
                    'code' => 500,
                    'success' => false,
                    'message' => 'You\'r already dislike',
                ], 500);
            }
            $data->dislike = 1;
        }
        $data->save();
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'You\'r successfully ' . $request->type,
        ], 200);
    }
}
