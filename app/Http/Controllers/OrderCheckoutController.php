<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderCheckoutController extends Controller
{
    //
	public function index() {
		return view("checkout.index");
	}
	public function billing() {
		return view("checkout.step2");
	}
	public function final() {
		return view("checkout.step3");
	}
}
