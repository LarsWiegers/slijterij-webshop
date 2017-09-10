<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
	public function index() {
		$product = Product::find(1);
		$product->setAttribute("productImages",$product->getProductImages() );
		return view("product.index",["product" => $product]);
	}
}
