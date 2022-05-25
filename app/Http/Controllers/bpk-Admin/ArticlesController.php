<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Article_Category;
use App\Category;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use Illuminate\Validation\Rule;
use App\UserLoginLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Storage;
use Validator;

class ArticlesController extends Controller
{
    /**
     *
     * allow admin only
     *
     */
    public function __construct()
    {
        //$this->middleware(['role:admin|creator']);
        $this->middleware(['role:super-admin|admin']);
    }

    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (auth()->user()->can('list articles')) {
                $articles = Article::paginate(10);

                return view('admin.articles.index', compact('articles'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            if (auth()->user()->can('create articles')) {
                $categories = Category::all();
                return view('admin.articles.create', ['categories'=>$categories]);
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $rules = [
            'title'             => ['required', 'string', 'max:255', Rule::unique('articles')],
            'content'      => ['required', 'string', 'min:50'],
            //'featured_image'    => ['mimes:jpeg,bmp,png,PNG,JPG,jpg,JPEG', 'max:9000'],
        ];

        $customMessages = [
            'title.required'        => 'Title is required',
            'title.unique'          => 'The title "' . $request->title . '" has already been taken.',
            'content.required' => 'Content field is required',
            'content.min'      => 'The Content must be at least 50 characters.',
        ];

        $this->validate($request, $rules, $customMessages);
        try {

            if (auth()->user()->can('create articles')) {
                $article = new Article();
                $article->title = $request->title;
                $article->slug = Str::slug($request->title);
                $article->user_id = auth()->id();
                $article->sub_heading = $request->sub_heading;
                $article->meta_key  = $request->meta_key;
                $article->short_description = $request->short_description;
                $article->meta_description = $request->meta_description;
                $article->content  = $request->content;
                if($request->article_image){
                    $images = Helper::upload_image($request, 'article_image');
                    $article->article_image = json_encode($images);

                }
                $article->save();
                $articleSave = Article::where(['title' => $request->title])->first();
                $i = 0;
                $permission = $request->permission;
                if(!is_null($permission)){
                    while($i<count($permission)){
                        $link = new Article_Category();
                        $link->article_id = $articleSave->id;
                        $link->category_id = $permission[$i];
                        $link->save();
                        $i++;
     
                    }
                    
                }
                
                return redirect()->route('articles.index')->with('success', "The $article->title was saved successfully");
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
            // return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('admin.articles.show', ['article' => $article]);
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            if (auth()->user()->can('edit articles')) {
                $article = Article::findOrFail($id);
                $categories = Category::all();
                return view('admin.articles.edit', compact('article', 'categories'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => ['required', 'string', 'max:255', Rule::unique('articles')->ignore($id)],
            'content' => ['required', 'string', 'min:50'],
        ];

        $customMessages = [
            'title.required' => 'Title is required',
            'title.unique' => 'The title "' . $request->title . '" has already been taken.',
            'content.required' => 'Content field is required',
            'content.min' => 'The Content must be at least 50 characters.',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            if (auth()->user()->can('edit articles')) {

                $article = Article::find($id);
                if ($article->article_image) {
                    $image = json_decode($article->article_image, true); 
                    $delte = explode('/', $image['banner']);
                    $delte1 = explode('/', $image['featured']);
                    $delte2 = explode('/', $image['thumbnail']);
                    unlink(storage_path('app/public/banner/'. end($delte)));
                    unlink(storage_path('app/public/featured/'. end($delte1)));
                    unlink(storage_path('app/public/thumbnails/'. end($delte2)));
                    
                }

                $article->title             = $request->title;
                $article->sub_heading = $request->sub_heading;
                $article->meta_key  = $request->meta_key;
                $article->short_description = $request->short_description;
                $article->meta_description = $request->meta_description;
                $article->content  = $request->content;
                if($request->article_image){
                    $images = Helper::upload_image($request, 'article_image');
                    $article->article_image = json_encode($images);

                }
                $article->save();

                $articleSave = Article::where(['title' => $request->title])->first();
                $i = 0;
                $permission = $request->permission;
                if(!is_null($permission)){
                    Article_Category::where(['article_id' => $articleSave->id])->delete();
                    while($i<count($permission)){
                        $link = new Article_Category();
                        $link->article_id = $articleSave->id;
                        $link->category_id = $permission[$i];
                        $link->save();
                        $i++;
     
                    }
                    
                }

                return redirect()->route('articles.index')->with('warning', "The $article->title was updated successfully");
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (auth()->user()->can('delete articles')) {
                $article = Article::findOrFail($id);
                $article->delete();

                return redirect()->route('articles.index')->with('danger', "The $article->title was deleted successfully");
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Article::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
