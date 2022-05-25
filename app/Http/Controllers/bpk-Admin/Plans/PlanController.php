<?php

namespace App\Http\Controllers\Admin\Plans;

use App\Http\Controllers\Controller;
use App\Feature;
use App\Plan;
use App\Plan_Feature;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
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
                $plans = Plan::paginate(10);

                return view('admin.plans.index', compact('plans'));
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
            if (auth()->user()->can('create articles')) {

                $features = Feature::all();
                return view('admin.plans.create', ['features'=>$features]);
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
            'title' => 'required',
            'description' => 'required'
        ];

        $messagerules = [
            'title.required' => 'Title is required',
            'title.unique' => 'This' . $request->title . 'is taken already',
            'description.required' => 'Description is required'
        ];

        $this->validate($request, $rules, $messagerules);

        try {
            
            if (auth()->user()->can('create articles')) { 

                $plan = new Plan();
                $plan->title = $request->title;
                $plan->description = $request->description;
                $plan->slug = Str::slug($request->title);
                $plan->total_cost = $request->total_cost;
                $plan->save();
                $planId = Plan::where(['title' => $request->title])->first();
                $feature = $request->features;
                $i = 0; 
                if(!is_null($feature)){
                    while($i<count($feature)){
                        $link = new Plan_Feature();
                        $link->plan_id = $planId->id;
                        $link->feature_id = $feature[$i];
                        $link->save();
                        $i++;
     
                    }
                    
                }

                return redirect()->route('plans.index')->with('success', 'Plan ' . "$request->title" . ' succesfully created');
                
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
     * Display the specified resource.
     *
     * @param  \App\Plans\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {

        try {
            if (auth()->user()->can('edit articles')) {

                $havefeatures = Plan_Feature::where(['plan_id' => $plan->id])->pluck('feature_id');
                $features = Feature::find($havefeatures);  
                return view('admin.plans.show', ['plan'=>$plan, 'features'=>$features]);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plans\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        try {
            if (auth()->user()->can('edit articles')) {
                $features = Feature::all();
                $havefeatures = Plan_Feature::where(['plan_id' => $plan->id])->pluck('feature_id');
                return view('admin.plans.edit', ['plans' => $plan, 'features' => $features, 'havefeatures' => $havefeatures]);
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
     * @param  \App\Plans\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required'
        ];

        $messagerules = [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required'
        ];

        $this->validate($request, $rules, $messagerules);

         try {
             if (auth()->user()->can('edit articles')) {

                 $feature = $request->features;
                 $i = 0; 
                 Plan::where(['id'=>$request->hidden])->update(['title'=>$request->title, 'description' => $request->description]);
                 Plan_Feature::where(['plan_id'=>$request->hidden])->delete();

                 if(!is_null($feature)){
                    while($i<count($feature)){
                        $link = new Plan_Feature();
                        $link->plan_id = $request->hidden;
                        $link->feature_id = $feature[$i];
                        $link->save();
                        $i++;
     
                      }
                 }
                 
                 return redirect()->back()->with('success', 'Successfully Updated');
               
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
     * @param  \App\Plans\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        try {
            if (auth()->user()->can('delete articles')) {
                
                Plan::destroy($plan->id);
                return redirect()->back()->with('success', 'Successfully Deleted');
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
