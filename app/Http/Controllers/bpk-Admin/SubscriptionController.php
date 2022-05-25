<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Feature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Helpers\Helper;
use App\Plan;
use App\Plan_Feature;
use App\UserPayment;
use Softon\Indipay\Facades\Indipay;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    /**
     *
     * allow admin only
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //check user is logged in or not 

    public function index()
    {
        if(auth()->user()->hasRole('super-admin')){
            $UserPayment = UserPayment::with('plan')->paginate(10);
        }else{
            $UserPayment = UserPayment::where('user_id', auth()->id())->with('plan')->paginate(10);
        }
        if (Auth::check()) {
            return view('admin.subscriptions.subscriptions', ['UserPayment' => $UserPayment]);
           
        } else {
            return redirect()->route('login')->with('danger', 'you are not logged In. Please login ');
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
        if(auth()->user()->hasRole('super-admin')){
            $UserPayment = UserPayment::where(['id' => $id])->with('plan')->first();
        }else{
            $UserPayment = UserPayment::where(['user_id' => auth()->id(), 'id' => $id])->with('plan')->first();
        }
        return view('admin.subscriptions.show', ['UserPayment' => $UserPayment]);
    }
}
