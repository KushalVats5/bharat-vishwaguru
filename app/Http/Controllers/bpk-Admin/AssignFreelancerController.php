<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\InstaEfilling;
use App\IncomeTaxReturn;
use Exception;
use Illuminate\Support\Facades\Cache;

class AssignFreelancerController extends Controller
{
    //

    public function index($planId){
        $freelancers = User::role('freelancer')->paginate(10); 
        $id = 1;
        Cache::put('plan_id', $planId);
        return view('admin.freelancer.index', compact('freelancers', 'id', 'planId'));
    }

    public function assign($id){

        try{
            $planId = Cache::get('plan_id');
            $insta = InstaEfilling::where('id', $planId)->first();

            if ($insta->assign_to == null) {
                # code...
                $insta->assign_to = $id;
                $insta->save();
            }else{
                throw new Exception('Already Assigned.');
            }

    
            return redirect()->back()->with('success', 'Project Assigned to Freelancer');

        }catch(Exception $e){
            return redirect()->back()->with('warning', $e->getMessage());

        }
        
    }

    public function incometax_index($planId){
        $freelancers = User::role('freelancer')->paginate(10); 
        $id = 1;
        Cache::put('plan_id', $planId);
        return view('admin.income_tax_return.freelancerindex', compact('freelancers', 'id', 'planId'));
    }

    public function incometax_assign($id){

        try{
            // dd($id);
            $planId = Cache::get('plan_id');
            $insta = IncomeTaxReturn::where('id', $planId)->first();

            if ($insta->assign_to == null) {
                # code...
                $insta->assign_to = $id;
                $insta->save();
            }else{
                throw new Exception('Already Assigned.');
            }

    
            return redirect()->back()->with('success', 'Project Assigned to Freelancer');

        }catch(Exception $e){
            return redirect()->back()->with('warning', $e->getMessage());

        }
        
    }
}
