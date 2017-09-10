<?php

namespace App\Http\Middleware;

use App\Product;
use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\View;

class ShoppingCart
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
    	$cartItems = session("cartItems");
    	if(!isset( $cartItems ) ) {
			$cartItems = new Collection();
	    }
	    $CountShoppinCartItems = count( $cartItems );
	    $totalPriceCartItems = 0;
	    foreach($cartItems as $item) {
	    	$totalPriceCartItems += $item->price;
    }
    	View::share("shoppingCartItems",$cartItems);
    	View::share("CountShoppinCartItems",$CountShoppinCartItems);
    	View::share("totalPriceCartItems",$totalPriceCartItems);
        return $next($request);
    }
}
