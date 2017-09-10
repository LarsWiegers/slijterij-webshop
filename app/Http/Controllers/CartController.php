<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
	public function add_to_cart(Request $request,$productId,$returnUrl = null) {

		$request->session()->push('cartItems', (new Product())->find($productId) );

		return $this->returnRedirectBack($returnUrl);

	}
	public function remove_all(Request $request, $returnUrl = null) {
		$request->session()->forget("cartItems");
		return $this->returnRedirectBack($returnUrl);

	}
	private function returnRedirectBack($returnUrl) {
		if($returnUrl === null) {
			return redirect()->route("home");
		}
		return redirect($returnUrl);
	}
}
