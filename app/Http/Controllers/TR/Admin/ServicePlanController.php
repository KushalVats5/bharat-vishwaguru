<?php

namespace App\Http\Controllers\TR\Admin;

use App\Http\Controllers\Controller;
use App\ServicePlan;
use Illuminate\Http\Request;

class ServicePlanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        $records = ServicePlan::orderBy('created_at', 'desc')->paginate('20');
        return view('tr.admin.service-plan.index', ['records' => $records]);
    }

    public function add()
    {
        return view('tr.admin.service-plan.add-new');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $record = ServicePlan::findOrFail($request->id);
        return view('tr.admin.service-plan.add-new', ['record' => $record]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'duration' => 'required|numeric',
            'duration_unit' => 'required|string',
            'price' => 'required|numeric',
            'service_type' => 'required',
            'status' => 'required',
        ]);
        if (isset($request->id)) {
            // update
            $record = ServicePlan::findOrFail($request->id);
            $record->update($request->all());
            return redirect()->route('tr/admin/service-plan/edit', ['id' => $record->id])->with(['status' => 'Record updated successfully.']);
        } else {
            // create new
            $record = new ServicePlan([
                'title' => $request->title,
                'description' => $request->description,
                'duration' => $request->duration,
                'duration_unit' => $request->duration_unit,
                'price' => $request->price,
                'service_type' => $request->service_type,
                'status' => $request->status,
            ]);
            $record->save();
            return redirect()->route('tr/admin/service-plan/all')->with(['status' => 'Record created successfully.']);
        }
    }
}