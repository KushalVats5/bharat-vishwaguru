<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //$role = Auth::user()->role;
            $roles = Auth::user()->getRoleNames()->toArray();
            if (in_array('admin', $roles)) {
                return redirect('/tr/admin/dashboard');
            } elseif (in_array('freelancer', $roles)) {
                return redirect('/tr/freelancer/dashboard');
            } elseif (in_array('manager', $roles)) {
                return redirect('/tr/manager/dashboard');
            } elseif (in_array('support', $roles)) {
                return redirect('/tr/support/dashboard');
            } else {
                return redirect('/tr/user/dashboard');
            }

            /* switch ($role) {
            case 'admin':
            return redirect('/tr/admin/dashboard');
            break;
            case 'freelancer':
            return redirect('/tr/reviewer/dashboard');
            break;
            case 'manager':
            return redirect('/tr/manager/dashboard');
            break;
            case 'support':
            return redirect('/tr/mediator/dashboard');
            break;

            default:
            return redirect('/home');
            break;
            } */

            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}