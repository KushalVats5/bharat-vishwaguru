<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

// use App\Http\Controllers\Traits\FileUploadTrait;

class RegisterController extends Controller
{
    // use FileUploadTrait;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'numeric', 'digits:10', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'role' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'is_active' => 1,
        ]);

        /* $form = [];
        $form['name'] = 'Registration Form';
        // dd($user);
        $messages = $user;

        Mail::send('mail.register', ['data' => $user], function ($message) use ($user) {
            $message->sender('support@taxring.com', 'Taxring');
            $message->subject('Taxring || New Registration');
            $message->to($user->email);
        });

        Mail::send('mail.register', ['data' => $user], function ($message) use ($user) {
            $message->sender($user->email, 'Taxring');
            $message->subject('Taxring || New Registration');
            $message->to('support@taxring.com');
        }); */

        if ($data['role'] == "freelancer") {
            # code...
            $user->assignRole('freelancer');
        } else {
            $user->assignRole("user");
        }
        return $user;
    }

    protected function freelancer_register_save(Request $request)
    {
        // dd("===", $request->all());
        $request->offsetUnset('_token');
        $user = new User($request->all());
        if ($request->hasFile('education_certificate')) {
            $file = $request->file('education_certificate');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/uploads/';
            $file->move($destinationPath, $fileName);
            $user->education_certificate = $fileName;
        }

        // $user->email = Str::random(6).'@getnada.com';
        $user->password = Hash::make($request->password);
        $user->is_active = 0;

        // dd($user, $request->all());
        // $user->save() ;
        try {
            if ($user->save()) {
                $user->syncRoles([]);
                if ($request->role == "freelancer") {
                    # code...
                    $user->assignRole('freelancer');
                } else {
                    $user->assignRole("user");
                }
                // $user = User::find(176) ;
                // return view('mail.new-register');
               /*  Mail::send('mail.new-register', ['data' => $user], function ($message) use ($user) {
                    $message->sender('support@taxring.com', 'Taxring');
                    $message->subject('Taxring || New Registration');
                    $message->to($user->email);
                    // $message->to('kvats69@gmail.com');
                });
                Mail::send('mail.new-register', ['data' => $user], function ($message) use ($user) {
                    $message->sender('support@taxring.com', 'Taxring');
                    $message->subject('Taxring || New Registration');
                    // $message->to('support@taxring.com');
                    $message->to('taxring@getnada.com');
                });
                if (Mail::failures()) {
                    return redirect()->back()->with('error', 'Registeraition failed !!!');
                } else {
                    return redirect()->back()->with('success', 'Your are successfully registered, wait for approval by admin!!!');
                } */
                return redirect()->back()->with('success', 'Your are successfully registered, wait for approval by admin!!!');
            } else {
                return redirect()->back()->with('error', 'Registeraition failed !!!');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect()->back()->with('error', 'User already exists !!!');
            }
        }

    }

    public function freelancer_register()
    {
        return view('auth.freelancer_register');
    }
    public function check_ifsc(Request $request)
    {
        $ifsc = Helper::get_bank_details($request->ifsc);
        return $ifsc;
    }
}