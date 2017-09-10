<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class onlyAdmins
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
    	if(Auth::check() && (new User())->find(Auth::id())->isAdmin()){
		    return $next($request);
	    }else {
    		return redirect(route("not_allowed"));
	    }

    }
}
