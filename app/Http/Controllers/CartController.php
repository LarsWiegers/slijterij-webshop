<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
	public function remove_all(Request $request, $returnUrl = null) {
		$request->session()->forget("cartItems");
		if($returnUrl === null) {
			return redirect()->route("home");
		}
		return redirect($returnUrl);
	}
}
