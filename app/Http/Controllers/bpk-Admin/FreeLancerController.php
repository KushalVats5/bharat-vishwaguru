<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UserPayment;
use App\InstaEfilling;
use Exception;
use Illuminate\Http\Request;
use App\IncomeTaxReturn;
use App\User;

class FreeLancerController extends Controller
{
    //

    public function index(){

        $freelancer_id = auth()->id();
        $projects = InstaEfilling::where('assign_to', $freelancer_id)->latest()->paginate(10);
        $id = 1;

        return view('freelancer.freelancer_projects.index', compact('projects', 'id'));
    }

    public function show($id){
        $form = InstaEfilling::find($id);
        return view('freelancer.freelancer_projects.show', compact('form'));

    }

    public function show2($id){
        $form = UserPayment::where('user_plan_id', $id)->where('order_status', 'Success')->first();
        return view('freelancer.freelancer_projects.show2', compact('form'));
    }

    public function work_upload(Request $request){
        try{
            if (isset($request->work)) {

                $data = InstaEfilling::find($request->insta_plan_id);
                # code...
                $new1 = [];
                for ($i=0; $i <count($request->work) ; $i++) {
                # code...
                $document = $request->work[$i];
                $file = $document->getClientOriginalName();
                $filename = $data->pancard . $file;
                //dd($file, $filename, $document);
                $document->storeAs('/public/insta_efiling_work_done/', $filename);
                //dd($filename);
                $new1[$i] = $filename;
            }

            //dd($data, $new1);
            $data->work_done = json_encode($new1);
            $data->save();
            return redirect()->back()->with('success', 'File Uploaded.');
            }else{
                throw new Exception('Input not Found');
            }

        }catch(Exception $e){
            return redirect()->back()->with('warning', $e->getMessage());
        }

    }

    public function status_update(Request $request){
        $insta = InstaEfilling::find($request->insta_plan_id);
        $insta->status = $request->status;
        $insta->save();
    }


    public function index_incometaxreturn(){
        $freelancer_id = auth()->id();
        $projects = IncomeTaxReturn::where('assign_to', $freelancer_id)->latest()->paginate(10);
        $id = 1;
        return view('freelancer.incometaxreturn.index', compact('projects', 'id'));
    }


    public function show_incometaxreturn($id){
        $form = IncomeTaxReturn::find($id);
        return view('freelancer.incometaxreturn.show', compact('form'));

    }

    public function show2_incometaxreturn($id){
        $form = UserPayment::where('user_plan_id', $id)->where('order_status', 'Success')->first();
        return view('freelancer.incometaxreturn.show2', compact('form'));
    }

    public function download_incometaxreturn($id)
    {
        $form = IncomeTaxReturn::find($id);
        $data = $form->upload_form_1616a;
        //dd($data);
        $file = public_path() . "/storage/" . "form_1616a/" . $data;
        return response()->download($file);
    }

    public function download2_incometaxreturn($id)
    {
        $form = IncomeTaxReturn::find($id);
        $data = $form->other_document;
        //dd($data);
        $file = public_path() . "/storage/" . "other_document/" . $data;
        return response()->download($file);
    }

    public function income_tax_return_form16(Request $request)
    {
        // dd($request->all());
        $form = IncomeTaxReturn::find($id);
        $data = $form->upload_form_1616a;
        //dd($data);
        $file = public_path() . "/storage/" . "/form_1616a/" . $data;
        return response()->download($file);
    }

    public function form1616a_upload_incometaxreturn(Request $request){
        try{
            //dd($request->all(), $request->form1616a);
            if (isset($request->form1616a)) {
                # code...
                $data = IncomeTaxReturn::find($request->taxreturn_plan_id);
                $file = $request->form1616a->getClientOriginalName();
                $filename = time() . $file;
                //dd($file, $filename);
                $request->form1616a->storeAs('/public/form1616a_done/', $filename);
                $data->form1616a_done = $filename;
                return redirect()->back()->with('success', 'File Uploaded.');
            }else{
                throw new Exception('Input not Found');
            }

        }catch(Exception $e){
            return redirect()->back()->with('warning', $e->getMessage());
        }
    }

    public function otherdocument_upload_incometaxreturn(Request $request){
        try{
            //dd($request->all(), $request->form1616a);
            if (isset($request->other_document)) {
                # code...
                $data = IncomeTaxReturn::find($request->taxreturn_plan_id);
                $file = $request->other_document->getClientOriginalName();
                $filename = time() . $file;
                $request->other_document->storeAs('/public/other_document_done/', $filename);
                $data->other_document_done = $filename;
                return redirect()->back()->with('success', 'File Uploaded.');
                // dd($file, $filename);
            }else{
                throw new Exception('Input not Found');
            }

        }catch(Exception $e){
            return redirect()->back()->with('warning', $e->getMessage());
        }
    }

    public function incometaxreturn_status_update(Request $request){
        $insta = IncomeTaxReturn::find($request->insta_plan_id);
        $insta->status = $request->status;
        $insta->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function freelancer_view($id)
    {
        $freelancer =  User::findOrFail($id);
        return view('admin.freelancer.freelancer', ['freelancer' => $freelancer]);
    }

}
