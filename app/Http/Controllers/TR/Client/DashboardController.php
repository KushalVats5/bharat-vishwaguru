<?php

namespace App\Http\Controllers\TR\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        if(!File::isDirectory(storage_path('app/public/uploads/'))){
            File::makeDirectory(storage_path('app/public/uploads/'), 0777, true, true);
        }
        $this->middleware('auth');
    }
    public function index()
    {
        return view('tr.client.dashboard');
    }
    public function myProfile()
    {
        return view('tr.client.profile');
    }
    public function updateProfile(Request $request)
    {
        try {
            $user = Auth::user();

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = $file->getClientOriginalName();
                // $destinationPath = public_path('app/public/uploads/');
                // $file->save($destinationPath, $fileName);
                // $file->store(storage_path('app/public/uploads/'), $fileName);
                Storage::disk('public')->put($fileName,storage_path('/app/public/uploads/'));
                $user->avatar = $fileName;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            if ($user->save()) {
                // dd($request->all(), $user, Auth::user());
                return redirect()->back()->with('success', 'Profile successfully updated!!!');
            } else {
                return redirect()->back()->with('error', 'Registeraition failed !!!');
            }
        // } catch (\Illuminate\Database\QueryException $e) {
        } catch (\Exception $e) {
            $error = $e->getMessage();
            dd($e);
            \Log::info($e);
            return redirect()->back()->with('error', (array)$error);
        }
    }

    public function unauthorized_access()
    {
        return view('tr.client.un-authorized');
    }
}
