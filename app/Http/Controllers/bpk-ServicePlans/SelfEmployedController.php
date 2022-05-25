<?php

namespace App\Http\Controllers\ServicePlans;

use App\Http\Controllers\Controller;
use App\ServicePlans\SelfEmployed;
use Illuminate\Http\Request;

class SelfEmployedController extends Controller
{
    public function subscriptionDetails(){
        $data = SelfEmployed::paginate(10);
        return view('subscriberDetails',['data'=>$data]);
    }
}
