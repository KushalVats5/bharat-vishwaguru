<?php

namespace App\Http\Controllers\Admin\Plans;

use App\Http\Controllers\Controller;
use App\Feature;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        try{
            if(auth()->user()->can('list articles')){
                
                $features = Feature::paginate(10);
                return view('admin.features.index', compact('features'));
            }
            else{
                throw new Exception('You don\'t have a rights to perform this action');
            }
        }catch(Exception $e){
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
        
        try{
            if(auth()->user()->can('create articles')){
                
                return view('admin.features.create');
            }
            else{
                throw new Exception('You don\'t have a rights to perform this action');
            }
        }catch(Exception $e){
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
            'title' => ['required', Rule::unique('features')],
            'price' => ['required', 'numeric']
        ];

        $messagerules = [
            'title.required' => 'Title is required',
            'title.unique'   => 'The title "' . $request->title . '" has already been taken.',
            'price.required' => 'Price is required',
        ];

        $this->validate($request, $rules, $messagerules);

        try{
            if(auth()->user()->can('create articles')){

                $feature = new Feature();
                $feature->title = $request->title;
                $feature->price = $request->price;
                $feature->slug = Str::slug($request->title);
                $feature->save();
                return redirect()->route('features.index')->with('success', $request->title . " successfully created");

            }
            else{
                throw new Exception('You don\'t have a rights to perform this action');
            }

        }catch(Exception $e){
            // return redirect()->route('home')->with('warning', $e->getMessage());
            return redirect()->back()->with('warning', $e->getMessage());
            return $e->getMessage();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plans\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        // try{
        //     if(auth()->user()->can('create articles')){
        //         return view('admin.features.show');

        //     }
        //     else{
        //         throw new Exception('You don\'t have a rights to perform this action');
        //     }
        // }catch(Exception $e){
        //     return redirect()->route('home')->with('warning', $e->getMessage());
        //     return $e->getMessage();
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plans\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        try{
            if(auth()->user()->can('edit articles')){

                return view('admin.features.edit', ['features' => $feature]);

            }
            else{
                throw new Exception('You don\'t have a rights to perform this action');
            }
        }catch(Exception $e){
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plans\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $rules = [
            'title' => ['required'],
            'price' => ['required','numeric']
        ];

        $messagerules = [
            'title.required' => 'Title is required',
            'price.required' => 'Price is required'
        ];

        $this->validate($request, $rules, $messagerules);

        try{
            if(auth()->user()->can('edit articles')){
                Feature::where(['id'=>$request->hidden])->update(['title'=>$request->title, 'price'=>$request->price]);
                return redirect()->back()->with('success', 'Successfully Updated');

            }
            else{
                throw new Exception('You don\'t have a rights to perform this action');
            }
        }catch(Exception $e){
            // return redirect()->route('home')->with('warning', $e->getMessage());
            return redirect()->back()->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plans\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        try{
            if(auth()->user()->can('delete articles')){
                Feature::destroy($feature->id);
                return redirect()->route('features.index')->with('Successfully Deleted');

            }
            else{
                throw new Exception('You don\'t have a rights to perform this action');
            }
        }catch(Exception $e){
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }
}
