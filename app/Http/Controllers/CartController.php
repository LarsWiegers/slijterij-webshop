<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CartController extends Controller {
	//
	public function addToCart( Request $request, $productId ) {
		session()->push('cartItems',( new Product() )->find( $productId ) );
		return back();

	}

	public function removeOne( $productId) {

		session( [ "cartItems" => $this->removeOneItemFromCart( session( "cartItems" ), $productId ) ] );

		return back();
	}

	public function removeAll( Request $request ) {
		$request->session()->forget( "cartItems" );

		return back();
	}

	/*
	* Removes only 1 item if there are multiple of the same one
	*/
	private function removeOneItemFromCart( $cartItems, $productId ) {
		$newCartItems = new Collection();
		$foundIt      = false;
		foreach ( $cartItems as $item ) {
			if ( $item->id == $productId ) {
				if($foundIt === false) {
					$foundIt = true;
				}else {
					$newCartItems->push( $item );
				}
			} else {
				$newCartItems->push( $item );
			}
		}
		return $newCartItems;
	}

}
