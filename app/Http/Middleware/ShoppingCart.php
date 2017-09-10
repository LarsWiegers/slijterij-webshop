<?php

namespace App\Http\Middleware;

use App\Product;
use Closure;
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
	    $featuredProducts = Product::get()->take(10);
	    foreach($featuredProducts as $product) {
		    $product->productImage = $product->getProductImages();
	    }
	    $CountShoppinCartItems = count($featuredProducts);
    	View::share("shoppingCartItems",$featuredProducts);
    	View::share("CountShoppinCartItems",$CountShoppinCartItems);
        return $next($request);
    }
}
