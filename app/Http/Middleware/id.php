<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\id as Middleware;
use Illuminate\Support\Facades\Auth;

class id {

    public function handle($request, Closure $next, String $id) {
        if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
            return redirect('/home');

        $user = Auth::user();
        if($user->id == $id)
            return $next($request);

        return redirect('/home');
    }
}
