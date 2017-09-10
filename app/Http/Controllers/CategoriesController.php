<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
	public function index() {
		$products = Product::get()->take(10);
		foreach($products as $product) {
			$product->productImage = $product->getProductImages();
		}
		return view("categories.index",["products" => $products]);
	}
}
