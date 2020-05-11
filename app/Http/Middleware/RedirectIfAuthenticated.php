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
        /*if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }*/
        switch ($guard) {
            case 'admin':
                # code...
                if(Auth::guard($guard)->check())
                {
                    return redirect()->route('admin.dashboard');
                }
                break;
            
            default:
                # code...
                if(Auth::guard($guard)->check())
                {
                    return redirect()->route('shirts');
                }
                break;
        }

        return $next($request);
    }
}
