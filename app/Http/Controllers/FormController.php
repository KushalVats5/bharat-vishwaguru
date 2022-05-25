<?php

namespace App\Http\Controllers;

use App\GstForm;
use App\IncomeTaxReturn;
use App\InstaEfilling;
use App\MsmeForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function gstform()
    {
        return view('gstform');
    }

    public function gstsubmit(Request $request)
    {
        // dd($request->all(), auth()->id());
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = auth()->id();
        GstForm::create($data);
        return redirect()->route('home')->with('success', 'Successfully Registerd');
    }

    public function memeForm()
    {
        return view('msme');
    }

    public function msmeform_submit(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $data['user_id'] = auth()->id();
        MsmeForm::create($data);
        return redirect()->route('home')->with('success', 'Successfully Form Submitted.');
    }

    public function income_tax_return()
    {
        return view('form.income_tax_return');
    }

    public function income_tax_return_submit(Request $request)
    {
        $data = $request->all();
       
        $this->validate($request, [
            'pancard' => 'required',
            'name' => 'required',
            'mobile_no' => 'required',
            // 'dob' => 'required',
            // 'father_name' => 'required',
            // 'gender' => 'required',
            // $request->aadhar_number => 'required',
            // $request->flat_no => 'required',
            // $request->area => 'required',
            // $request->town => 'required',
            // $request->state => 'required',

            // $request->pincode => 'required',
            // $request->mobile_no => 'required',
            // $request->email_address => 'required',
            // $request->residential_status => 'required',
            // $request->ifsc_code => 'required',

            // $request->bank_name => 'required',
            // $request->account_number => 'employer_category',
            // $request->filing_status => 'required',
            // $request->original_acknowledgement_no => 'required',
            // $request->date_of_filling_of_original_return => 'required',
            // $request->notice_no => 'required',

        ]);

        unset($data['_token']);
        unset($data['upload_form_1616a']);
        unset($data['other_document']);
        unset($data['ifsc_code']);
        unset($data['bank_name']);
        unset($data['account_number']);
        unset($data['tick_account_for_refund']);

        $data['ifsc_code'] = json_encode($request->ifsc_code);
        $data['bank_name'] = json_encode($request->bank_name);
        $data['account_number'] = json_encode($request->account_number);
        $data['tick_account_for_refund'] = json_encode($request->tick_account_for_refund);
        $data['user_id'] = auth()->id();
      



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
//   dd($data);
        $getData = IncomeTaxReturn::where(['user_id' => auth()->id()])->whereDate('created_at', '=', date('Y-m-d'))->first();
        if(!empty($getData)){
            // dd($getData, "==");
            $itaxreturn = IncomeTaxReturn::where(['user_id' => $data['user_id']])->whereDate('created_at', '=', date('Y-m-d'))->update($data);
            $getData = IncomeTaxReturn::where(['user_id' => auth()->id()])->whereDate('created_at', '=', date('Y-m-d'))->first();
        }else{
            $getData = IncomeTaxReturn::create($data);
        }
        // dd($getData);
        // $itaxreturn = IncomeTaxReturn::create($data);
        \Cache::put('user_plan_name', "Income Tax Return");
        \Cache::put('total_amt', '1');
        \Cache::put('user_plan_id', $getData->id);
        \Cache::put('user_plan_sub_name', null);
        \Cache::put('formfilled', $getData);

        return redirect('payment');
        // dd($data, \Cache::get('user_plan_name'), \Cache::get('user_plan_sub_name'),  \Cache::get('income_tax_return_id'), );

    }


    public function insta_efiling()
    {
        return view('form.insta_efiling_tax_return');
    }

    public function insta_efiling_submit(Request $request)
    {


        $data = $request->all();
        // dd($data);
        unset($data['_token']);
        unset($data['document']);
        unset($data['total_amount']);
        $data['user_id'] = auth()->id();



        if ($request->document) {
            # code...
            //dd($request->document);
            $new1 = [];
            for ($i = 0; $i < count($request->document); $i++) {
                # code...
                $document = $request->document[$i];
                $file = $document->getClientOriginalName();
                $filename = $request->pancard . $file;
                //dd($file, $filename, $document);
                $document->storeAs('/public/insta_efiling/', $filename);
                //dd($filename);
                $new1[$i] = $filename;
            }
            $data['document'] = json_encode($new1);
        }

        $insta = InstaEfilling::create($data);

        \Cache::put('user_plan_name', "instaEfilling");
        \Cache::put('user_plan_sub_name', $request->are_you);
        \Cache::put('total_amt', $request->total_amount);
        \Cache::put('user_plan_id', $insta->id);
        \Cache::put('formfilled', $insta);

        //dd($insta->id);
        return redirect('payment');
        // return redirect()->back()->with('success', 'Form Successfully submitted. ');
    }
}
