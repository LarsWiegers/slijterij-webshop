<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class AgeRestriction
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
    	// if the user is not old enough based on a session variable
	    if(session("age_verification") === false ) {
		    if($this->isOnAgeRestrictionFalseResult($request)) {
			    return $next($request);
		    }
	    	return redirect()->route("age_restriction_result_false");
	    }
    	// if the session is not set or we are not on the page that can set it we redirect to that page
	    if( is_null(session("age_verification") )
	    ){
			if($this->isOnTheAgeRestrictionPage($request) ||
			   $this->isOnTheAgeRestrictionResultPageTrue($request) ||
			   $this->isOnTheAgeRestrictionResultPageFalse($request) ||
			   $this->isOnAgeRestrictionFalseResult($request)
			){
				return $next($request);
			}
	    	return redirect()->route("age_verification");
	    }
	    return $next($request);
    }

    private function isOnTheAgeRestrictionPage(Request $request) {
	    return $request->getPathInfo() === URL::route("age_verification", [], false);
    }
	private function isOnTheAgeRestrictionResultPageTrue(Request $request) {
		return $request->getPathInfo() === URL::route("age_verification_result", ["boolean" => "yes"], false);
	}
	private function isOnTheAgeRestrictionResultPageFalse(Request $request) {
		return $request->getPathInfo() === URL::route("age_verification_result", ["boolean" => "no"], false);
	}
	private function isOnAgeRestrictionFalseResult(Request $request) {
		return $request->getPathInfo() === URL::route("age_restriction_result_false",[], false);
	}
}
