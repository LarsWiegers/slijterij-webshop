<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
	/**
	 *
	 * looks for the wanted product
	 * and returns a view that displays it
	 *
	 * @param       String
	 * @return      View
	 *
	 */
    public function searchProduct($productName) {
		$product = (new Product())->where("name", 'LIKE' , "%" . $productName . "%")
		                          ->firstOrFail();
		$product->productImages = $product->getProductImages();
		return view("product.index",["product" => $product]);
	}
}
