<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',["featuredProducts" => $this->getFeaturedProducts()]);
    }
    private function getFeaturedProducts(){
	    $featuredProducts = Product::get()->take(10);
	    foreach($featuredProducts as $product) {
		    $product->productImage = $product->getProductImages();
	    }
	    return $featuredProducts;
    }
}
