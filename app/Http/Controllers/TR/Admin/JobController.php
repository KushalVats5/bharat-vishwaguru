<?php

namespace App\Http\Controllers\TR\Admin;

use App\GstFiling;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Job;
use App\JobComment;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * Display a listing of Jobs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        try {
            if (auth()->user()->can('list job')) {
                $jobs = Job::orderBy('id', 'DESC')->paginate(10);
                return view('tr.admin.jobs.index', compact('jobs'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $job_city = '';
        //$assesment_years = [];
        //$service_plans = [];
        // $cities = [];
        $job = Job::findOrFail($request->id);
        $job_parent_model = $job->jobable_type;
        switch ($job_parent_model) {
            case 'App\GstFiling':
                $gst_filing = GstFiling::where('id', $job->jobable_id)->first();
                $job_city = $gst_filing->gst_info->city_name->name;
                break;

            default:
                # code...
                break;
        }
        $freelancers = User::role('freelancer')->where('is_active', 1)->where('distic', '!=', $job_city)->get();
        //$assesment_years = Helper::generate_assesment_years(3);
        //$service_subscription = ServiceSubscription::where('service_type', 'gst return file')->where('service_id', $gst_info->id)->with('service_plan')->first();
        ///$states = State::where('country_id', 101)->orderBy('name', 'ASC')->get();
        //$cities = City::where('state_id', $gst_info->state)->orderBy('name', 'ASC')->get();

        try {
            if (auth()->user()->can('edit GstInfo')) {
                return view('tr.admin.jobs.view_job', compact('job', 'freelancers', 'job_city'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }

    }

    public function save_comment(Request $request)
    {
        $user = Auth::user();
        $response = [];
        $request->validate([
            'message' => 'required',
            'parent_id' => 'required',
            'attachments.*' => 'max:10000|mimes:pdf,jpg,jpeg,png,json',
        ]);

        try {
            if (auth()->user()->can('create JobComment')) {

                $allowedfileExtension = ['pdf', 'jpg', 'jpeg', 'png', 'pdf'];
                $attachment_filename = [];
                if ($request->hasFile('attachments')) { // upload photo if set
                    $files = $request->file('attachments');
                    $count = 0;
                    foreach ($files as $file) {
                        $extension = $file->getClientOriginalExtension();
                        if (in_array($extension, $allowedfileExtension)) {
                            $attachment_filename[$count] = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
                            $path = storage_path('app/documents/');
                            $file->move($path, $attachment_filename[$count]);
                            $count++;
                        }
                    }
                } else {
                    $response['files'] = $request->file('attachments');
                }

                if (isset($request->comment_id)) {
                    // update existing
                    $record = JobComment::findOrFail($request->comment_id);
                    $old_attachments = json_decode($record->attachments);
                    $attachment_filename = array_merge($old_attachments, $attachment_filename);

                    $update = [
                        'message' => $request->message,
                        'attachments' => json_encode($attachment_filename),
                    ];
                    $record->update($update);

                    $response['status'] = 'success';
                    $response['message'] = 'Comment updated successfully!';
                    $response['data'] = ['id' => $record->id];

                } else {
                    // create new
                    $record = new JobComment([
                        'message' => $request->message,
                        'jobcommentable_type' => 'App\Job',
                        'jobcommentable_id' => $request->job_id,
                        'parent_id' => $request->parent_id,
                        'attachments' => json_encode($attachment_filename),
                        'user_id' => $user->id,
                    ]);
                    $record->save();
                    $response['status'] = 'success';
                    $response['message'] = 'Comment added successfully!';
                    $response['data'] = ['id' => $record->id];

                }

            } else {
                $response['status'] = 'failed';
                $response['message'] = 'You don\'t have a rights to perform this action';
                $response['data'] = [];
            }
        } catch (\Exception $e) {
            $response['status'] = 'failed';
            $response['message'] = $e->getMessage();
            $response['data'] = [];
        }
        return response()->json($response);

    }

    public function update_job(Request $request)
    {
        $user = Auth::user();
        $job_id = $request->job_id;
        $job = Job::where('id', $job_id)->first();
        $update_data = [];
        if (isset($request->status)) {
            $update_data['status'] = $request->status;
        }

        if (isset($request->assign_to)) {
            $update_data['assigned_to'] = $request->assign_to;
            $update_data['assigned_by'] = $user->id;
        }

        $allowedfileExtension = ['pdf', 'jpg', 'jpeg', 'png'];
        $gstr1_filename = [];
        if ($request->hasFile('gstr1')) {
            $file = $request->file('gstr1');
            $extension = $file->getClientOriginalExtension();
            if (in_array($extension, $allowedfileExtension)) {
                $gstr1_filename = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
                $path = storage_path('app/documents/');
                $file->move($path, $gstr1_filename);
                $update_gst_file['gstr1_doc'] = $gstr1_filename;

                $gst_filing = GstFiling::where('id', $job->jobable->id)->first();

                if ($gst_filing->update($update_gst_file)) {
                    $response['status'] = 'success';
                    $response['message'] = 'GSTR1 document has been updated!';

                } else {
                    $response['status'] = 'failed';
                    $response['message'] = 'Update failed, Please try again later!';

                }
                return response()->json($response);
            } else {
                $response['status'] = 'failed';
                $response['message'] = 'Update failed, Please upload valid file!';
                return response()->json($response);
            }

        }

        $gstr3b_filename = [];
        if ($request->hasFile('gstr3b')) {
            $file = $request->file('gstr3b');
            $extension = $file->getClientOriginalExtension();
            if (in_array($extension, $allowedfileExtension)) {
                $gstr3b_filename = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
                $path = storage_path('app/documents/');
                $file->move($path, $gstr3b_filename);
                $update_gst_file['gstr3b_doc'] = $gstr3b_filename;

                $gst_filing = GstFiling::where('id', $job->jobable->id)->first();

                if ($gst_filing->update($update_gst_file)) {
                    $response['status'] = 'success';
                    $response['message'] = 'gstr3b document has been updated!';

                } else {
                    $response['status'] = 'failed';
                    $response['message'] = 'Update failed, Please try again later!';

                }
                return response()->json($response);
            } else {
                $response['status'] = 'failed';
                $response['message'] = 'Update failed, Please upload valid file!';
                return response()->json($response);
            }

        }

        $tax_computation_filename = [];
        if ($request->hasFile('tax_computation')) {
            $file = $request->file('tax_computation');
            $extension = $file->getClientOriginalExtension();
            if (in_array($extension, $allowedfileExtension)) {
                $tax_computation_filename = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
                $path = storage_path('app/documents/');
                $file->move($path, $tax_computation_filename);
                $update_gst_file['tax_computation_doc'] = $tax_computation_filename;

                $gst_filing = GstFiling::where('id', $job->jobable->id)->first();

                if ($gst_filing->update($update_gst_file)) {
                    $response['status'] = 'success';
                    $response['message'] = 'Tax Computation document has been updated!';

                } else {
                    $response['status'] = 'failed';
                    $response['message'] = 'Update failed, Please try again later!';

                }
                return response()->json($response);
            } else {
                $response['status'] = 'failed';
                $response['message'] = 'Update failed, Please upload valid file!';
                return response()->json($response);
            }

        }

        $gst_challan_filename = [];
        if ($request->hasFile('gst_challan')) {
            $file = $request->file('gst_challan');
            $extension = $file->getClientOriginalExtension();
            if (in_array($extension, $allowedfileExtension)) {
                $gst_challan_filename = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
                $path = storage_path('app/documents/');
                $file->move($path, $gst_challan_filename);
                $update_gst_file['gst_challan_doc'] = $gst_challan_filename;

                $gst_filing = GstFiling::where('id', $job->jobable->id)->first();

                if ($gst_filing->update($update_gst_file)) {
                    $response['status'] = 'success';
                    $response['message'] = 'GST Challan document has been updated!';

                } else {
                    $response['status'] = 'failed';
                    $response['message'] = 'Update failed, Please try again later!';

                }
                return response()->json($response);
            } else {
                $response['status'] = 'failed';
                $response['message'] = 'Update failed, Please upload valid file!';
                return response()->json($response);
            }

        }

        /*
        if ($request->hasFile('attachments')) { // upload photo if set
        $files = $request->file('attachments');
        $count = 0;
        foreach ($files as $file) {
        $extension = $file->getClientOriginalExtension();
        if (in_array($extension, $allowedfileExtension)) {
        $attachment_filename[$count] = rand(1, 9999) . time() . '.' . $file->getClientOriginalExtension();
        $path = storage_path('app/documents/');
        $file->move($path, $attachment_filename[$count]);
        $count++;
        }
        }
        } else {
        $response['files'] = $request->file('attachments');
        }

         */

        if ($job->update($update_data)) {
            $response['status'] = 'success';
            $response['message'] = 'Updated successfully!';
        } else {
            $response['status'] = 'failed';
            $response['message'] = 'Update failed, Please try again later!';
        }

        return response()->json($response);
    }

    public function get_file_url($filename)
    {
        //echo "we are here";
        return Helper::download_file('app/documents/', $filename);
    }
}