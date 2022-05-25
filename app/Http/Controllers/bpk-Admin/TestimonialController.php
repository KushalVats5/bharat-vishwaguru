<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Testimonial;
use Exception;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (auth()->user()->can('list pages')) {
                $testimonial = Testimonial::paginate(10);
                return view('admin.testimonial.index', compact('testimonial'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            if (auth()->user()->can('list pages')) {
                return view('admin.testimonial.create');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'             => ['required', 'string', 'max:255', Rule::unique('testimonial')],
            'content'      => ['required', 'string', 'min:50'],
            // 'featured_image'    => ['mimes:jpeg,bmp,png,PNG,JPG,jpg,JPEG', 'max:9000'],
        ];

        $customMessages = [
            'title.required'        => 'Title is required',
            'title.unique'          => 'The title "' . $request->title . '" has already been taken.',
            'content.required' => 'Content field is required',
            'content.min'      => 'The Content must be at least 50 characters.',
        ];

        $this->validate($request, $rules, $customMessages);
        try {
            if (auth()->user()->can('create pages')) {
                $data = $request->all();
                $images = Helper::upload_image($request, 'featured_image');
                $data['user_id'] = auth()->id();
                $data['featured_image'] = json_encode($images);
                $data['slug'] = Str::slug($request->title);
                //dd($data);
                Testimonial::create($data);
                return redirect()->route('testimonial.index')->with('success', "The $request->title was saved successfully");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.show', ['page' => $testimonial]);
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
            if (auth()->user()->can('edit pages')) {
                $page = Testimonial::findOrFail($id);
                
                return view('admin.testimonial.edit', compact('page'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title'             => ['required', 'string', 'max:255', Rule::unique('testimonial')->ignore($id)],
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
            if (auth()->user()->can('edit pages')) {

                $data = $request->all();
                $testimonial = Testimonial::find($id);
                if ($request->featured_image) {
                    $image = json_decode($testimonial->featured_image, true);
                    if ($testimonial->featured_image) {
                        # code...
                        $delte = explode('/', $image['banner']);
                        $delte1 = explode('/', $image['featured']);
                        $delte2 = explode('/', $image['thumbnail']);
                        unlink(storage_path('app/public/banner/'. end($delte)));
                        unlink(storage_path('app/public/featured/'. end($delte1)));
                        unlink(storage_path('app/public/thumbnails/'. end($delte2)));
                    }
                    $images = Helper::upload_image($request, 'featured_image');
                    $data['featured_image'] = json_encode($images);
                }

                $data['user_id'] = auth()->id();
                $data['slug'] = Str::slug($request->title);
                unset($data['_token']);
                unset($data['_method']);
                Testimonial::where('id', $id)->update($data);

                return redirect()->route('testimonial.index')->with('warning', "The $request->title was updated successfully");
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (auth()->user()->can('delete pages')) {
                $page = Testimonial::findOrFail($id);
                $page->delete();
                return redirect()->route('testimonial.index')->with('danger', "The $page->title was deleted successfully");
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }
}
