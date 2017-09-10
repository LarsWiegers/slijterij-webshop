<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgeVerificationController extends Controller
{
	/*
	 * Displays the screen that gives the user a choise between if they are older than 18 or not
	 */
	public function index() {
		return view("age_verification.index");
	}
	/*
	 * Redirects to the right page for the give choice of the user
	 */
	public function validation($boolean) {
		switch($boolean) {
			case 'yes':
				session(["age_verification" => true]);
				return redirect()->route("home");
				break;
			case 'no':
				session(["age_verification" => false]);
				return redirect()->route("age_restriction_result_false");
				break;
			default:
				return redirect()->route("age_verification");
				break;
		}
	}
	/*
	 * Displays the page that shows the user they are not allowed on this website because of their age choice
	 */
	public function age_restriction_false() {
		return view("age_verification.false");
	}
}
