<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Helpers\Helper;
use App\Plan;
use App\Plan_Feature;
use App\UserPayment;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;
use Carbon\Carbon;


class PayuMoneyController extends Controller
{

    public function PayuMoneyProcess()
    {
        return view('payumoney.payumoney');
    }
    
    public function PayuMoneyResponse(Request $request)
    {
        return view('payumoney.success');
        //dd($_REQUEST);
       // dd('Payment Successfully done!', $request->all());
    }
    
    public function PayuMoneyCancel(Request $request)
    {
        dd('Payment Cancel!', $request->all());
    }
    public function PayuMoneyFailed (Request $request)
    {
        //dd('Payment Failed!', $request->all());
        return view('payumoney.failure');
    }
}