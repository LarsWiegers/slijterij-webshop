<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;

class infoBar
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
    	$message =session("message");
    	$status = session("status");
    	if(isset($message) && isset($status)) {
		    View::share("message",$message);
		    View::share("status",$status);
	    }
        return $next($request);
    }
}
