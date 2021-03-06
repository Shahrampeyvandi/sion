<?php

namespace App\Http\Middleware;

use App\Admin as AppAdmin;
use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        if (Auth::guard('admin')->check()) {
           
            return $next($request);
        }else{
            return redirect()->route('Admin.Login');
        }
        
    }
}
