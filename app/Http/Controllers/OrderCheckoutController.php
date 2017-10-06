<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderCheckoutController extends Controller
{
    //
	public function index() {
		return view("checkout.index");
	}
	public function billing() {
		if(count(session("cartItems")) < 0) {
			return back();
		}
		$totalPriceCartItems = 0;
		foreach(session("cartItems") as $item) {
			$totalPriceCartItems += $item->price;
		}
		$now = Carbon::now();
		$stillOpenOrder = DB::table("orders")->where("user_id","=",Auth::id())
		                   ->where("status","=",false)->get();
		if(count($stillOpenOrder) > 0) {
			// there are still order open for this user

		}else {
			DB::table('orders')->insert([
				"user_id" => Auth::id(),
				"date_of_order" => $now,
				"status" => false,
				"price" => $totalPriceCartItems,
				"telephone_number" => Auth::user()->telephone_number,
				"email" => Auth::user()->email,
				"first_name" => Auth::user()->first_name,
				"last_name" => Auth::user()->last_name,
				"address" => Auth::user()->address,
				"postcode" => Auth::user()->postcode,
				"city" => Auth::user()->city,
				"country" => Auth::user()->country,
			]);
			$order = DB::table("orders")->where("date_of_order","=",$now)->get()->first();
			foreach(session("cartItems") as $cartItem) {
				DB::table("orders_rows")->insert([
					"product_id" => $cartItem->id,
					"order_id" => $order->id,
					"name" => $cartItem->name,
					"price" => $cartItem->price,
				]);
			}

		}
		return view("checkout.step2");
	}
	public function final() {
		return view("checkout.step3");
	}
}
