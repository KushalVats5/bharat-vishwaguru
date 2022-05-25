<?php

namespace App\Http\Controllers\TR\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Page;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    /**
     *
     * allow admin only
     *
     */
    public function __construct()
    {
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
            if (auth()->user()->can('list pages')) {
                $pages = Page::paginate(10);
                return view('tr.admin.pages.index', compact('pages'));
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
            if (auth()->user()->can('create pages')) {
                return view('tr.admin.pages.create');
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
            'title' => ['required', 'string', 'max:255', Rule::unique('pages')],
            'content' => ['required', 'string', 'min:50'],
            // 'featured_image'    => ['mimes:jpeg,bmp,png,PNG,JPG,jpg,JPEG', 'max:9000'],
        ];

        $customMessages = [
            'title.required' => 'Title is required',
            'title.unique' => 'The title "' . $request->title . '" has already been taken.',
            'content.required' => 'Content field is required',
            'content.min' => 'The Content must be at least 50 characters.',
        ];

        $this->validate($request, $rules, $customMessages);
        try {
            if (auth()->user()->can('create pages')) {

                //$images = Helper::upload_image($request, 'page_image');
                if ($request->hasFile('page_image')) {
                    $file = $request->file('page_image');
                    if (!$file->isValid()) {
                        return redirect()->route('page.create')->with(['warning' => 'Page image file is not valid.']);
                    }
                    $images = Helper::uploadImage($request, 'page_image');
                }

                $page = new Page();
                $page->title = $request->title;
                $page->slug = Str::slug($request->title);
                //$page->user_id = auth()->id();
                $page->sub_heading = $request->sub_heading;
                $page->meta_key = $request->meta_key;
                $page->short_description = $request->short_description;
                $page->meta_description = $request->meta_description;
                $page->content = $request->content;
                $page->page_image = json_encode($images);
                $page->save();
                return redirect()->route('page.index')->with('warning', "The $page->title was saved successfully");
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
        try {
            if (auth()->user()->can('edit pages')) {
                # code...
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
        $page = Page::find($id);
        return view('tr.admin.pages.show', ['page' => $page]);
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
            if (auth()->user()->can('edit pages')) {
                $page = Page::findOrFail($id);
                return view('tr.admin.pages.edit', compact('page'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
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
            'title' => ['required', 'string', 'max:255', Rule::unique('pages')->ignore($id)],
            'content' => ['required', 'string', 'min:50'],
            //'featured_image'    => ['mimes:jpeg,bmp,png,PNG,JPG,jpg,JPEG', 'max:9000'],
        ];

        $customMessages = [
            'title.required' => 'Title is required',
            'title.unique' => 'The title "' . $request->title . '" has already been taken.',
            'content.required' => 'Content field is required',
            'content.min' => 'The Content must be at least 50 characters.',
        ];

        $this->validate($request, $rules, $customMessages);
        // dd($request);
        try {
            if (auth()->user()->can('edit pages')) {

                $page = Page::find($id);
                if ($request->hasFile('page_image')) {
                    if ($page->page_image != '') {
                        $image = json_decode($page->page_image, true);
                        //$delte = explode('/', $image['banner']);
                        //$delte1 = explode('/', $image['featured']);
                        //$delte2 = explode('/', $image['thumbnail']);
                        //unlink(storage_path('app/public/banner/' . end($delte)));
                        //unlink(storage_path('app/public/featured/' . end($delte1)));
                        //unlink(storage_path('app/public/thumbnails/' . end($delte2)));
                    }
                }

                $page->title = $request->title;
                $page->sub_heading = $request->sub_heading;
                $page->meta_key = $request->meta_key;
                $page->short_description = $request->short_description;
                $page->meta_description = $request->meta_description;
                $page->content = $request->content;
                /* if ($request->page_image) {
                # code...
                $images = Helper::upload_image($request, 'page_image');
                $page->page_image = json_encode($images);
                } */

                if ($request->hasFile('page_image')) {
                    $file = $request->file('page_image');
                    if (!$file->isValid()) {
                        return redirect()->route('page.index')->with(['warning' => 'Page image file is not valid.']);
                    }
                    //$images = Helper::upload_image($request, 'page_image');
                    $images = Helper::uploadImage($request, 'page_image', [[150, 150], [1400, null]]);

                    $page->page_image = json_encode($images);

                }

                $page->save();

                return redirect()->route('page.index')->with('warning', "The $page->title was updated successfully");
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
            if (auth()->user()->can('delete pages')) {
                $page = Page::findOrFail($id);
                $page->delete();

                return redirect()->route('page.index')->with('danger', "The '$page->title' was deleted successfully");
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
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
            $entries = Page::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}