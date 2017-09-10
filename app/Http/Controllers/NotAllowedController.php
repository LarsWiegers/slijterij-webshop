<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotAllowedController extends Controller
{
    //
	public function index() {
		return view("not_allowed.index");
	}
}
