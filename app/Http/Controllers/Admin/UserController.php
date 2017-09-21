<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index() {
		$users = User::all()::where("role_id","=","2")->get();
		return view("admin.users.index",["users" => $users]);

	}
	public function add() {
		return view("admin.product.add",["categories" => Category::all()]);
	}
	public function make() {
		$product = new Product();
		$product->name = Input::get("name");
		$product->category_id = (int) Input::get("category_id");
		$product->description = Input::get("description");
		$online = Input::get("online");
		if(isset($online)) {
			$product->online = 1;
		}else {
			$product->online = 0;
		}
		$product->price = (double) Input::get("price");
		$product->quantity = Input::get("quantity");
		$product->code = Input::get("code");
		$product->save();

		return redirect()->route("admin_products_home");
	}
	public function edit($id) {
		$product = Product::findOrFail($id);
		return view("admin.product.edit",["product" => $product ,"category" => Category::all()]);
	}
	public function delete($productId) {
		$product = Product::findOrFail($productId);
		$product->delete();
		return back();
	}
}
