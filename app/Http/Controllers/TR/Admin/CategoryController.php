<?php

namespace App\Http\Controllers\TR\Admin;

use App\Article_Category;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['role:admin|creator']);
        if(!File::isDirectory(storage_path('app/public/uploads/banner/'))){
            File::makeDirectory(storage_path('app/public/uploads/banner/'), 0777, true, true);
        }
        if(!File::isDirectory(storage_path('app/public/uploads/thumbnails/'))){
            File::makeDirectory(storage_path('app/public/uploads/thumbnails/'), 0777, true, true);
        }
        if(!File::isDirectory(storage_path('app/public/uploads/images/'))){
            File::makeDirectory(storage_path('app/public/uploads/images/'), 0777, true, true);
        }
        if(!File::isDirectory(storage_path('app/public/uploads/featured/'))){
            File::makeDirectory(storage_path('app/public/uploads/featured/'), 0777, true, true);
        }
        $this->middleware(['role:super-admin|admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories = Category::paginate(10);
            return view('tr.admin.categories.index', ['categories' => $categories]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something Wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {

            $allCategories = Category::all();
            return view('tr.admin.categories.create', ['allCategories' => $allCategories]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something Wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = [];
        $rules = [
            'title' => 'required|unique:title',
            //'category_image' => "dimensions:width=1920,height=700",
        ];

        $custommessages = [
            'title.required' => 'Title is required',
            'title.unique' => 'Title should be unique',

            //'category_image.dimensions' => 'dimensions required width=1920 and height=700 above. '
        ];

        // $this->validate($request, $rules, $custommessages);

        try {

            //Create new child
            $category = new Category();
            $category->title = $request->title;
            $category->parent_id = $request->parent_id;
            $category->slug = $request->title;
            if ($request->has('category_image')) {
                $images = Helper::upload_image($request, 'category_image');
                $category->category_image = json_encode($images);
                // dd("==", $images);

            }
            $category->save();
            return redirect()->route('category.index')->with('success', 'New Category added successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something Wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = Category::find($id);
            $allCategories = Category::all();
            return view('tr.admin.categories.edit', ['categories' => $categories, 'allCategories' => $allCategories]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something Wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
            ]);

            $category = Category::find($request->hidden);
            if ($category->category_image != null) {
                $image = json_decode($category->category_image, true);
                $delte = explode('/', $image['banner']);
                $delte1 = explode('/', $image['featured']);
                $delte2 = explode('/', $image['thumbnail']);
                if(Storage::exists('uploads/banner/'. end($delte))) {
                    Storage::disk('public')->delete('uploads/banner/'. end($delte));
                }
                if(Storage::exists('uploads/featured/'. end($delte1))) {
                    Storage::disk('public')->delete('uploads/featured/'. end($delte1));
                }
                if(Storage::exists('uploads/thumbnails/'. end($delte2))) {
                    Storage::disk('public')->delete('uploads/thumbnails/'. end($delte2));
                }
            }
            if ($request->has('category_image')) {
                $images = Helper::upload_image($request, 'category_image');
                $category->category_image = json_encode($images);
                // dd("==", $images);

            }

            //Category::where(['id' => $request->hidden])->update(['title' => $request->title, 'slug' => $request->title, 'parent_id' => $request->parent_id, 'category_image' => json_encode($image)]);
            Category::where(['id' => $request->hidden])->update(['title' => $request->title, 'slug' => $request->title, 'parent_id' => $request->parent_id, 'category_image' => $category->category_image]);

            return back()->with('success', 'Category updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Category::destroy($id);
            Article_Category::destroy($id);
            return redirect()->route('categories.index')->with('success', 'Successfully Deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something Wrong');
        }
    }
}