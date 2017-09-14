<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\MailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MailListController extends Controller
{
    //
	public function  addUser(Request $request) {
		$request->validate([
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' => 'required|unique:mail_users,email|max:255'
		],["unique" => "Het :attribute wordt al gebruikt" ]);
		$mailUser = new MailUser();
		$mailUser->first_name = Input::get("first_name");
		$mailUser->last_name = Input::get("last_name");
		$mailUser->email = Input::get("email");
		$mailUser->save();
		session()->flash("message", "U bent succesvol toegevoegd aan de mail lijst");
		session()->flash("status" , 1 );
		return back();
	}
}
