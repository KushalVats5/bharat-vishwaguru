<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserEvent;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if (!Auth::check()) {
            return view('errors.404');
        }
        event(new UserEvent($request, $user));
    }

    //added to overwrite the login credentials
    protected function credentials(Request $request)
    {
        return [
            'email' => request()->email,
            'password' => request()->password,
            'is_active' => 1,
        ];
    }

    public function redirectTo()
    {
        $roles = Auth::user()->getRoleNames()->toArray();

        if (in_array('admin', $roles)) {
            return '/tr/admin/dashboard';
        } elseif (in_array('freelancer', $roles)) {
            return '/tr/freelancer/dashboard';
        } elseif (in_array('manager', $roles)) {
            return '/tr/manager/dashboard';
        } elseif (in_array('support', $roles)) {
            return '/tr/support/dashboard';
        } else {
            return '/tr/user/dashboard';
        }

    }
}