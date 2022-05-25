<?php

namespace App\Http\Controllers\TR\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (auth()->user()->can('list articles')) {
                $services = Service::paginate(10);

                return view('tr.admin.services.index', compact('services'));
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
                return view('tr.admin.services.create', ['categories' => $categories]);
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
            'title' => ['required', 'string', 'max:255', Rule::unique('services')],
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
        try {

            if (auth()->user()->can('create articles')) {
                $service = new Service();
                $service->title = $request->title;
                $service->slug = Str::slug($request->title);
                $service->user_id = auth()->id();
                $service->sub_heading = $request->sub_heading;
                $service->meta_key = $request->meta_key;
                $service->short_description = $request->short_description;
                $service->meta_description = $request->meta_description;
                $service->content = $request->content;
                $service->price = $request->price;
                if ($request->service_image) {
                    $images = Helper::upload_image($request, 'service_image');
                    $service->service_image = json_encode($images);

                }
                $service->save();

                return redirect()->route('tr/admin/service')->with('success', "The $request->title was saved successfully");
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
        $article = Service::find($id);
        return view('tr.admin.services.show', ['article' => $article]);
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
                $article = Service::findOrFail($id);
                $categories = Category::all();
                return view('tr.admin.services.edit', compact('article', 'categories'));
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
        //dd($request->all());

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

                $service = Service::find($id);
                if ($service->service_image) {
                    $image = json_decode($service->service_image, true);
                    $delte = explode('/', $image['banner']);
                    $delte1 = explode('/', $image['featured']);
                    $delte2 = explode('/', $image['thumbnail']);
                    if (file_exists(storage_path('app/public/banner/' . end($delte)))) {
                        unlink(storage_path('app/public/banner/' . end($delte)));
                    }
                    if (file_exists(storage_path('app/public/featured/' . end($delte1)))) {
                        unlink(storage_path('app/public/featured/' . end($delte1)));
                    }
                    if (file_exists(storage_path('app/public/thumbnails/' . end($delte2)))) {
                        unlink(storage_path('app/public/thumbnails/' . end($delte2)));
                    }

                }

                $service->title = $request->title;
                $service->sub_heading = $request->sub_heading;
                $service->meta_key = $request->meta_key;
                $service->short_description = $request->short_description;
                $service->meta_description = $request->meta_description;
                $service->content = $request->content;
                $service->price = $request->price;
                if ($request->service_image) {
                    $images = Helper::upload_image($request, 'service_image');
                    $service->service_image = json_encode($images);

                }
                $service->save();

                return redirect()->route('service.index')->with('warning', "The $request->title was updated successfully");
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('service.index')->with('warning', $e->getMessage());
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
                $service = Service::findOrFail($id);
                $service->delete();

                return redirect()->route('service.index')->with('danger', "The $service->title was deleted successfully");
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