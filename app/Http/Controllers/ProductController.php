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
	public function searchProduct($productName) {
		$product = Product::where("name", 'LIKE' , "%" . $productName . "%")->get()[0];
		if(! count( $product ) ) {
			// if product does not exist
			return view("product.does_not_exist");
		}
		$product->productImages = $product->getProductImages();

		return view("product.index",["product" => $product]);


	}
}
