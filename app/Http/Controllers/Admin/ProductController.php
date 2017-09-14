<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    //
	public function index() {
		$products = Product::all();
		foreach($products as $product) {
			$product->category = Category::find($product->category_id);
		}
		return view("admin.product.index",["products" => $products]);

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
