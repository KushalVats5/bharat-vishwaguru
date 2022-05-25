<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Helpers\Helper;
use App\Plan;
use App\Plan_Feature;
use App\UserPayment;
use App\InstaEfilling;
use App\IncomeTaxReturn;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;



class SubsPaymentController extends Controller
{

    //for subscriptiondetails in dashboard
    public function subscriptionDetails()
    {
        $subs = UserPayment::latest()->paginate(10);
        return view('admin.subsdetails.index', compact('subs'))->with('no', 1);
    }

    public function subscription_details_show($id)
    {
        //dd($id);
        $form = UserPayment::find($id);
        return view('admin.subsdetails.show', compact('form'));
    }

    public function insta_document_download($id)
    {

        $form = InstaEfilling::find($id);
        $data = json_decode($form->work_done);
        //dd($data);
        $zip = new \ZipArchive();
        $zip_name = time() . ".zip"; // Zip name
        $zip->open($zip_name,  \ZipArchive::CREATE);
        foreach ($data as $file) {
            //echo $path = "uploadpdf/" . $file;
            $file1 = public_path() . "/storage/" . "/insta_efiling_work_done/" . $file;
            $zip->addFile($file1);
        }
        $zip->close();
        return response()->download($zip_name);
    }

    public function incometaxreturn_form1616a($id)
    {
        $form = IncomeTaxReturn::find($id);
        $data = $form->form1616a_done;
        //dd($data);
        if ($data == null) {
            # code...
            return redirect()->back()->with('danger', 'No File Uploaded Yet.');
        } else {
            $file = public_path() . "/storage/" . "form1616a_done/" . $data;
            return response()->download($file);
        }
    }

    public function incometaxreturn_other_document($id)
    {

        $form = IncomeTaxReturn::find($id);
        $data = $form->other_document_done;
        // dd($data);

        if ($data == null) {
            # code...
            return redirect()->back()->with('danger', 'No File Uploaded Yet.');
        } else {
            $file = public_path() . "/storage/" . "other_document_done/" . $data;
            return response()->download($file);
        }
    }


    //for subscription page 
    public function subscription()
    {

        $content = new \stdClass();
        $plans = Plan::all();
        $features = Feature::all();
        $clicks = Plan_Feature::all();
        // $content = collect([
        //     'title' => 'Subscription',
        // ]);
        $content->title = 'Subscription';
        // dd($features);

        return view('plans', ['plans' => $plans, 'features' => $features, 'click' => $clicks, 'content' => $content]);
    }

    //check user is logged in or not 

    public function paymentGate(Request $request)
    {
        $UserPayment = UserPayment::where('user_id', auth()->id())->where('is_active', false)->where('order_status', 'Success')->first();
        // $UserPayment = UserPayment::scopeIsExpired()->first();
        // dd($UserPayment);
        //  dd(auth()->id(), $UserPayment);
        if (Auth::check()) {
            if ($UserPayment) {
                return redirect()->back()->with('warning', 'Your subscription already exists');
            }
            Session::put('plan_id', $request->plan_id);
            return redirect()->route('payment');
        } else {
            return redirect()->route('login')->with('danger', 'you are not logged In. Please login ');
        }
    }

    public function afterpayment()
    {
        return view('afterpayment');
    }

    public function gstsubmit(Request $request)
    {
        dd($request->all());
    }

    public function checkGateway()
    {

        $parameters = [

            'merchant_id' => '34353',

            'currency' => 'INR',

            'redirect_url' => 'http://127.0.0.1/indipay/response',

            'cancel_url' => 'http://127.0.0.1/indipay/response',

            'language' => 'EN',

            'order_id' => '987654321',

            'amount' => 1200,


        ];
        //   dd($parameters);  
        $order = Indipay::gateway('CCAvenue')->prepare($parameters);
        return Indipay::process($order);
    }

    public function paymentResponse(Request $request)

    {


        // dd($request->all());
        $fy = [];
        $fy = Helper::financialYear();
        $response = Indipay::response($request);
        // $workingKey = '8E8F01B91BF3BB3A9C99B59DAA0103DE';        //Working Key should be provided here.
        $workingKey = 'CAF5291C6DA6B890673B0DBD67302120';        //Working Key should be provided here.
        $encResponse = $request->encResp;            //This is the response sent by the CCAvenue Server
        $rcvdString = Helper::decrypt($encResponse, $workingKey);    //Crypto Decryption used as per the specified working key.
        $order_status = "";
        parse_str($rcvdString, $decryptValues);

        if ($request->encResp) {

            //$response = Indipay::response($request);
            // $workingKey = '8E8F01B91BF3BB3A9C99B59DAA0103DE';        //Working Key should be provided here.
            $workingKey = 'CAF5291C6DA6B890673B0DBD67302120';        //Working Key should be provided here.
            $encResponse = $request->encResp;            //This is the response sent by the CCAvenue Server
            $rcvdString = Helper::decrypt($encResponse, $workingKey);    //Crypto Decryption used as per the specified working key.
            $order_status = "";

            parse_str($rcvdString, $decryptValues);
            // dd($rcvdString, $decryptValues);
            $decryptValues['user_id']               = auth()->id();
            $decryptValues['subscription_start']    = $fy['subscription_start'];
            $decryptValues['subscription_end']      = $fy['subscription_end'];
            $decryptValues['user_plan_name']      = \Cache::get('user_plan_name');
            $decryptValues['user_plan_sub_name']      = \Cache::get('user_plan_sub_name');
            $decryptValues['user_plan_id'] = \Cache::get('user_plan_id');

            // dd("paymentResponse", $decryptValues);
            $order_status = $decryptValues['order_status'];
            $formfilled = \Cache::get('formfilled');
            $form1 = \Cache::get('user_plan_name');
            $form = [];
            $form['name'] = $form1;

            Mail::send('mail.income-tax-return', ['formfilled' => $formfilled, 'form' => $form], function ($message) use ($formfilled, $form) {
                $message->sender('taxring@getnada.com', 'Taxring');
                $message->subject('Taxring || Income Tax Return Payment Recieved');
                $message->to('support@taxring.com');
                // $message->to('kvats69@gmail.com');
            });
            if (Mail::failures()) {
                echo "return response showing failed emails";
            } else {
                echo "return response showing success emails";
            }
            // dd($formfilled);
            if (isset($decryptValues['order_status']) && $decryptValues['order_status'] == 'Success') {
                UserPayment::create($decryptValues);

                // dd("paymentResponse", $decryptValues);

                $mess = ['mail' => $decryptValues['billing_email'], 'PlanName' => $decryptValues['user_plan_name']];
                Mail::send('mail.user-payment', ['mess' => $mess], function ($message) use ($mess, $order_status, $decryptValues) {
                    $message->sender('support@taxring.com', 'Taxring');
                    // $message->sender('kvats69@gmail.com', 'Taxring');
                    $message->subject('Taxring || Income Tax Return Payment ' . $order_status);
                    $message->to($decryptValues['billing_email']);
                });


                $form = [];
                $form['name'] = $form1;

                Mail::send('mail.income-tax-return', ['formfilled' => $formfilled, 'form' => $form], function ($message) use ($formfilled, $form) {
                    $message->sender('taxring@getnada.com', 'Taxring');
                    $message->subject('Taxring || Income Tax Return Payment Recieved');
                    $message->to('support@taxring.com');
                    // $message->to('kvats69@gmail.com');
                });
            } else {
                UserPayment::create($decryptValues);
                // dd($decryptValues);

                $mess = ['mail' => $decryptValues['billing_email'], 'PlanName' => $decryptValues['user_plan_name']];
                Mail::send('mail.user-payment', ['mess' => $mess], function ($message) use ($mess, $order_status, $decryptValues) {
                    $message->sender('support@taxring.com', 'Taxring');
                    // $message->sender('kvats69@gmail.com', 'Taxring');
                    $message->subject('Taxring || Income Tax Return Payment ' . $order_status);
                    $message->to($decryptValues['billing_email']);
                });

                // $formfilled = \Cache::get('formfilled');
                $form = [];
                $form['name'] = $form1;

                Mail::send('mail.support', ['formfilled' => $formfilled, 'form' => $form], function ($message) use ($formfilled, $form) {
                    $message->sender('taxring@getnada.com', 'Taxring');
                    $message->subject('Taxring || Income Tax Return Payment Failed');
                    $message->to('support@taxring.com');
                    // $message->to('kvats69@gmail.com');
                });
            }

            // dd("paymentResponse123", $formfilled, $decryptValues);

            \Cache::flush('user_plan_name', 'user_plan_sub_name', 'total_amt', 'user_plan_id', 'formfilled');

            return redirect()->route('home')->with('success', 'Payment has been successfully done. Our Team will Contact Soon.');
        } else {
            return redirect()->route('home')->with('success', 'Payment has been failed');
        }
    }


    public function serviceFormQuery(Request $request)
    {

        $formData = $request->except(['_token']);
        $data = array();
        parse_str($formData['formData'], $data);
        // dd($data);

        unset($data['_token']);
       /*  unset($data['upload_form_1616a']);
        unset($data['other_document']);
        unset($data['ifsc_code']);
        unset($data['bank_name']);
        unset($data['account_number']);
        unset($data['tick_account_for_refund']); */

        $data['ifsc_code'] = json_encode($data['ifsc_code']);
        $data['bank_name'] = json_encode($data['bank_name']);
        $data['account_number'] = json_encode($data['account_number']);
        $data['tick_account_for_refund'] = json_encode($data['tick_account_for_refund']);
        $data['user_id'] = auth()->id();
        // dd($data);



        if ($request->upload_form_1616a) {
            # code...
            $upload_form_1616a = $request->upload_form_1616a;
            $file = $upload_form_1616a->getClientOriginalName();
            $filename = $request->pancard . $file;
            //dd($file, $filename, $upload_form_1616a);
            $upload_form_1616a->storeAs('/public/form_1616a/', $filename);
            $data['upload_form_1616a'] = $filename;
        }

        if ($request->other_document) {
            # code...
            $other_document = $request->other_document;
            $file = $other_document->getClientOriginalName();
            $filename = $request->pancard . $file;
            //dd($file, $filename, $other_document);
            $other_document->storeAs('/public/other_document/', $filename);
            $data['other_document'] = $filename;
        }
        $getData = IncomeTaxReturn::where(['user_id' => $data['user_id']])->whereDate('created_at', '=', date('Y-m-d'))->first();
        // dd($getData);
        if(!empty($getData)){
            $flight = IncomeTaxReturn::where(['user_id' => $data['user_id']])->whereDate('created_at', '=', date('Y-m-d'))->update($data);
        }else{
            $flight = IncomeTaxReturn::create($data);
        }
        // dd($flight, $data);
        if($flight){
            echo "Create/Update Success";
        }else{
            echo "Create/Update Failed";
        }
        
    }
    /*
    * @param1 : Encrypted String
    * @param2 : Working key provided by CCAvenue
    * @return : Plain String
    */
    //ourcode 
    public function payment()
    {

        return view('paymentGatefiles.dataFrom');
    }

    public function ccavRequestHandler(Request $request)
    {
        //$working_key = '8E8F01B91BF3BB3A9C99B59DAA0103DE'; //Shared by CCAVENUES
        //$access_code = 'AVII03IC70AD38IIDA'; //Shared by CCAVENUES

        // $working_key = 'B57BCA91F053122B602B338A32DA220B'; //Shared by CCAVENUES
        // $access_code = 'AVTB03IC81AD56BTDA'; //Shared by CCAVENUES

        //localhost:8000
        // $access_code =  'AVDC03IC71BD80CDDB';
        // $working_key = 'E85661D56D661DA4BCDCD11F54AB9551';

        //for real payment
        $access_code =  'AVZJ70ED32BN79JZNB';
        $working_key = 'CAF5291C6DA6B890673B0DBD67302120';



        $merchant_data = '';
        $request->offsetUnset('_token');
        foreach ($request->all() as $key => $value) {
            $merchant_data .= $key . '=' . $value . '&';
        }
        $encrypted_data = Helper::encrypt($merchant_data, $working_key);
        //dd($encrypted_data);

        //return view('paymentGatefiles.ccavRequestHandler', ['encrypted_data' => $encrypted_data, 'access_code' => $access_code]);
        // $urlEncode = "https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest=$encrypted_data&access_code=$access_code";
        // dd($urlEncode);
        return redirect('https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest=' . $encrypted_data . '&access_code=' . $access_code);
    }
}
