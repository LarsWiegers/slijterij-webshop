<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

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
		    $product->productImage = (new ProductImage())->where("product_id","=",$product->id)->get();
	    }
	    return $featuredProducts;
    }
}
