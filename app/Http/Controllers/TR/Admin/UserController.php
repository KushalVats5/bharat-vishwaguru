<?php

namespace App\Http\Controllers\TR\Admin;

use App\FreelancerAvailability;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = [];
        if ($request->search_text != '') {
            $query[] = ['name', '%like%', $request->search_text];
            $query[] = ['email', '%like%', $request->search_text];
            $query[] = ['mobile', '%like%', $request->search_text];
        }

        $search = $request;
        if (count($query) > 0) {

            $users = User::where(function ($query) {
                global $request;
                $query->where('name', 'like', '%' . $request->search_text . '%')
                    ->orWhere('email', 'like', '%' . $request->search_text . '%')
                    ->orWhere('mobile', 'like', '%' . $request->search_text . '%');
            })->orderBy('created_at', 'desc')->paginate('20');

        } else {
            $users = User::orderBy('created_at', 'desc')->paginate('20');
        }

        return view('tr.admin.list-user', ['users' => $users, 'search' => $search]);
    }

    public function all_freelancers(Request $request)
    {
        $query = [];
        if ($request->search_text != '') {
            $query[] = ['name', '%like%', $request->search_text];
            $query[] = ['email', '%like%', $request->search_text];
            $query[] = ['mobile', '%like%', $request->search_text];
        }

        $search = $request;
        if (count($query) > 0) {

            $users = User::where(function ($query) {
                global $request;
                $query->where('name', 'like', '%' . $request->search_text . '%')
                    ->orWhere('email', 'like', '%' . $request->search_text . '%')
                    ->orWhere('mobile', 'like', '%' . $request->search_text . '%');
            })->role('freelancer')->orderBy('created_at', 'desc')->paginate('20');

        } else {
            $users = User::role('freelancer')->orderBy('created_at', 'desc')->paginate('20');
        }

        return view('tr.admin.list-freelancer', ['users' => $users, 'search' => $search]);
    }

    public function add()
    {
        return view('tr.admin.new-user');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = $user->getRoleNames();
        if ($user->hasRole('freelancer')) {
            return view('tr.admin.new-freelancer', ['user' => $user]);
        }
        return view('tr.admin.new-user', ['user' => $user]);
    }

    public function save(Request $request)
    {
        if (isset($request->id)) {
            // update
            $user = User::findOrFail($request->id);
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'mobile' => 'required|numeric|digits:10|unique:users,mobile,' . $user->id,
            ]);
            $user->update($request->all());
            return redirect()->route('tr/admin/user/edit', ['id' => $user->id])->with(['success' => 'User updated successfully.']);
        } else {
            // create new
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile' => 'required|numeric|digits:10|unique:users',
            ]);
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'is_active' => $request->is_active,
                'password' => Hash::make(rand(9, 999) . time()),
            ]);
            $user->save();
            return redirect()->route('tr/admin/user/new')->with(['success' => 'User created successfully.']);
        }
    }

    public function save_freelancer(Request $request)
    {
        if (isset($request->id)) {
            // update
            $user = User::findOrFail($request->id);
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'mobile' => 'required|numeric|digits:10|unique:users,mobile,' . $user->id,
                'dob' => 'required',
                'father_name' => 'string|max:255',
                'aadharno' => 'required|numeric|digits:12|unique:users,aadharno,' . $user->id,
                'pan' => 'required|string|min:10|unique:users,pan,' . $user->id,
                'qualification' => 'required|string|max:50',
                'flat' => 'required|string|max:255',
                'distic' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'pincode' => 'required|numeric|digits:6',
                'availability' => 'required',
                'mon_hours' => 'required|numeric',
                'tue_hours' => 'required|numeric',
                'wed_hours' => 'required|numeric',
                'thu_hours' => 'required|numeric',
                'fri_hours' => 'required|numeric',
                'sat_hours' => 'required|numeric',
                'sun_hours' => 'required|numeric',
            ]);
            //$user->update($request->all());
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'dob' => $request->dob,
                'father_name' => $request->father_name,
                'aadharno' => $request->aadharno,
                'pan' => $request->pan,
                'qualification' => $request->qualification,
                'flat' => $request->flat,
                'road_no' => $request->road_no,
                'area' => $request->area,
                'distic' => $request->distic,
                'state' => $request->state,
                'pincode' => $request->pincode,
                'is_active' => $request->is_active,
            ]);
            $user_availability = FreelancerAvailability::where('user_id', $request->id)->first();
            if ($user_availability) {
                $user_availability->update([
                    'availability' => $request->availability,
                    'mon_hours' => $request->mon_hours,
                    'tue_hours' => $request->tue_hours,
                    'wed_hours' => $request->wed_hours,
                    'thu_hours' => $request->thu_hours,
                    'fri_hours' => $request->fri_hours,
                    'sat_hours' => $request->sat_hours,
                    'sun_hours' => $request->sun_hours,
                    'notes' => $request->notes,
                ]);

            } else {
                $user_availability = new FreelancerAvailability([
                    'user_id' => $request->id,
                    'availability' => $request->availability,
                    'mon_hours' => $request->mon_hours,
                    'tue_hours' => $request->tue_hours,
                    'wed_hours' => $request->wed_hours,
                    'thu_hours' => $request->thu_hours,
                    'fri_hours' => $request->fri_hours,
                    'sat_hours' => $request->sat_hours,
                    'sun_hours' => $request->sun_hours,
                    'notes' => $request->notes,
                ]);
                $user_availability->save();
            }

            return redirect()->route('tr/admin/freelancer/edit', ['id' => $user->id])->with(['success' => 'Freelancer updated successfully.']);
        } else {
            // create new
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile' => 'required|numeric|digits:10|unique:users',
                'dob' => 'required',
                'father_name' => 'string|max:255',
                'aadharno' => 'required|numeric|digits:12|unique:users,aadharno,' . $user->id,
                'pan' => 'required|string|min:10|unique:users,pan,' . $user->id,
                'qualification' => 'required|string|max:50',
                'flat' => 'required|string|max:255',
                'distic' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'pincode' => 'required|numeric|digits:6',
                'availability' => 'required',
                'mon_hours' => 'required|numeric',
                'tue_hours' => 'required|numeric',
                'wed_hours' => 'required|numeric',
                'thu_hours' => 'required|numeric',
                'fri_hours' => 'required|numeric',
                'sat_hours' => 'required|numeric',
                'sun_hours' => 'required|numeric',
            ]);
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'is_active' => $request->is_active,
                'password' => Hash::make(rand(9, 999) . time()),
            ]);
            $user->save();

            $user_availability = new FreelancerAvailability([
                'user_id' => $user->id,
                'availability' => 'Available',
                'mon_hours' => '0',
                'tue_hours' => '0',
                'wed_hours' => '0',
                'thu_hours' => '0',
                'fri_hours' => '0',
                'sat_hours' => '0',
                'sun_hours' => '0',
                'notes' => '',
            ]);
            $user_availability->save();

            return redirect()->route('tr/admin/freelancer/new')->with(['success' => 'Freelancer created successfully.']);
        }
    }

    public function get_user_details(Request $request)
    {
        $response = [];
        //$request->user_role
        $user = User::role('freelancer')->where('is_active', 1)->where('id', $request->user_id)->first();
        if ($user) {
            $response['status'] = 'success';
            $response['message'] = 'Freelnacer found!';
            $response['data'] = ['user' => $user, 'availablity' => $user->available];
        } else {
            $response['status'] = 'failed';
            $response['message'] = 'Freelnacer not found!';
            $response['data'] = '';
        }
        return response()->json($response);
    }
}