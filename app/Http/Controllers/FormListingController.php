<?php

namespace App\Http\Controllers;

use App\IncomeTaxReturn;
use App\InstaEfilling;
use App\UserPayment;
use Illuminate\Http\Request;
// use ZipArchive;

use function GuzzleHttp\json_decode;

class FormListingController extends Controller
{
    //
    public function income_tax_return_list()
    {
        $forms = IncomeTaxReturn::latest()->paginate(10);
        $no = 1;
        return view('admin.income_tax_return.index', compact('forms', 'no'));
    }

    public function income_tax_return_show($id)
    {
        $form = IncomeTaxReturn::find($id);
 
        $bank_name = json_decode($form->bank_name);
        $bank_ifsc = json_decode($form->ifsc_code);
        $bank_account_number = json_decode($form->account_number);
        $tick_account_for_refund = json_decode($form->tick_account_for_refund);
        //dd($form, $bank_name, $bank_ifsc, $bank_account_number, $tick_account_for_refund);
        return view('admin.income_tax_return.show', compact('form', 'bank_name', 'bank_ifsc', 'bank_account_number', 'tick_account_for_refund'));
    }

    public function  income_tax_return_show2($id)
    {
        $form = UserPayment::where(['id'=>$id, 'user_plan_name'=> 'Income Tax Return'])->first();
        // dd($form);
        //dd($bank_name, $bank_ifsc, $bank_account_number, $tick_account_for_refund);
        return view('admin.income_tax_return.show2', compact('form'));
    }

    public function income_tax_return_form16($id)
    {
        $form = IncomeTaxReturn::find($id);
        $data = $form->upload_form_1616a;
        //dd($data);
        $file = public_path() . "/storage/" . "/form_1616a/" . $data;
        return response()->download($file);
    }

    public function income_tax_return_document($id)
    {
        $form = IncomeTaxReturn::find($id);
        $data = $form->other_document;
        //dd($data);
        $file = public_path() . "/storage/" . "/other_document/" . $data;
        return response()->download($file);
    }


    public function insta_tax_return_list()
    {
        $forms = InstaEfilling::latest()->paginate(10);
        $no =1;
        return view('admin.insta_form.index', compact('forms', 'no'));
    }

    public function insta_tax_return_show($id)
    {

        $form = InstaEfilling::find($id);
        return view('admin.insta_form.show', compact('form'));
    }

    public function  insta_tax_return_show2($id)
    {
        $form = UserPayment::where(['id'=>$id, 'user_plan_name'=> 'instaEfilling'])->first();
        // dd($form);
        //dd($bank_name, $bank_ifsc, $bank_account_number, $tick_account_for_refund);
        return view('admin.insta_form.show2', compact('form'));
    }

    public function insta_tax_return_download($id)
    {
        $form = InstaEfilling::find($id);
        $data = json_decode($form->document);
        //dd($data);
        $zip = new \ZipArchive();
        $zip_name = time() . ".zip"; // Zip name
        $zip->open($zip_name,  \ZipArchive::CREATE);
        foreach ($data as $file) {
            //echo $path = "uploadpdf/" . $file;
            $file1 = public_path() . "/storage/" . "/insta_efiling/" . $file;
            $zip->addFile($file1);
        }
        $zip->close();
        return response()->download($zip_name);
    }
}
