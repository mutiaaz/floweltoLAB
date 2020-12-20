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
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
            $id = Auth::user()->id;

            if ($id == 1){
                return redirect('/managerhome');
            }
            else if ($id!=1){
                return redirect('/userhome');
            }else{
                return redirect('/guesthome');
            }

//            switch ($id) {
//                case 'admin':
//                    return redirect('/admin_dashboard');
//                    break;
//                case 'seller':
//                    return redirect('/seller_dashboard');
//                    break;
//
//                default:
//                    return redirect('/home');
//                    break;
//            }
        }
        return $next($request);
    }
}
