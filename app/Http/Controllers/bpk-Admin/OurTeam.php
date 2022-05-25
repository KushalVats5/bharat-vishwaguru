<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\OurTeam as AppOurTeam;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OurTeam extends Controller
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
                $pages = AppOurTeam::paginate(10);
                return view('admin.ourteam.index', compact('pages'));
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
            if (auth()->user()->can('create pages')) {
                return view('admin.ourteam.create');
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
        //dd($request->all());
        $rules = [
            'name'             => ['required', 'string', 'max:255', Rule::unique('ourteam')],
            'content'      => ['required', 'string', 'min:50'],
            // 'featured_image'    => ['mimes:jpeg,bmp,png,PNG,JPG,jpg,JPEG', 'max:9000'],
        ];

        $customMessages = [
            'name.required'        => 'Title is required',
            'name.unique'          => 'The title "' . $request->title . '" has already been taken.',
            'content.required' => 'Content field is required',
            'content.min'      => 'The Content must be at least 50 characters.',
        ];

        $this->validate($request, $rules, $customMessages);
        try {
            if (auth()->user()->can('create pages')) {
                $data = $request->all();
                //dd($data);
                if ($request->featured_image) {
                    # code...
                    $images = Helper::upload_image($request, 'featured_image');
                    $data['featured_image'] = json_encode($images);
                }
                unset($data['_token']);
                //dd($data);
                AppOurTeam::create($data);
                return redirect()->route('ourteam.index')->with('success', "The $request->title was saved successfully");
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
        $ourteam = AppOurTeam::find($id);
        return view('admin.ourteam.show', ['page' => $ourteam]);
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
                $page = AppOurTeam::findOrFail($id);
                
                return view('admin.ourteam.edit', compact('page'));
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
            'name'             => ['required', 'string', 'max:255', Rule::unique('ourteam')->ignore($id)],
            'content'      => ['required', 'string', 'min:50'],
            //'featured_image'    => ['mimes:jpeg,bmp,png,PNG,JPG,jpg,JPEG', 'max:9000'],
        ];

        $customMessages = [
            'name.required'        => 'Name is required',
            'name.unique'          => 'The name "' . $request->title . '" has already been taken.',
            'content.required' => 'Content field is required',
            'content.min'      => 'The Content must be at least 50 characters.',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            if (auth()->user()->can('edit pages')) {

                $data = $request->all();
                $ourteam = AppOurTeam::find($id);
                if ($request->featured_image) {
                    $image = json_decode($ourteam->featured_image, true);
                    if ($image) {
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

                
                unset($data['_token']);
                unset($data['_method']);
                AppOurTeam::where('id', $id)->update($data);

                return redirect()->route('ourteam.index')->with('warning', "The $request->title was updated successfully");
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
                $page = AppOurTeam::findOrFail($id);
                $page->delete();
                return redirect()->route('ourteam.index')->with('danger', "The $page->title was deleted successfully");
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
