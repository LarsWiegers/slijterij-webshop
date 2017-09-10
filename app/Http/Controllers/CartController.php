<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CartController extends Controller {
	//
	public function addToCart( Request $request, $productId, $returnUrl = null ) {

		$request->session()->push( 'cartItems', ( new Product() )->find( $productId ) );

		return $this->returnRedirectBack( $returnUrl );

	}

	public function removeOne( $productId, $returnUrl = null ) {

		session( [ "cartItems" => $this->removeOneItemFromCart( session( "cartItems" ), $productId ) ] );

		return $this->returnRedirectBack( $returnUrl );
	}

	public function removeAll( Request $request, $returnUrl = null ) {
		$request->session()->forget( "cartItems" );

		return $this->returnRedirectBack( $returnUrl );

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
		private function returnRedirectBack( $returnUrl ) {
			if ( $returnUrl === null ) {
				return redirect()->route( "home" );
			}

			return redirect( $returnUrl );
		}
	}
