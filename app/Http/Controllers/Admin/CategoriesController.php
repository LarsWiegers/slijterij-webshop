<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CategoriesController extends Controller
{
    //
	public function index() {
		$categories = Category::all();
		foreach($categories as $category) {
			$category->amountOfProducts = DB::table("products")->where("category_id","=",$category->id)->count();
		}
		return view("admin.category.index",["categories" => $categories]);

	}
	public function add() {
		return view("admin.category.add");
	}
	public function make(Request $request) {
		$request->validate([
			"name" => "required|unique:categories,name|max:255"
		],[
			"unique" => ":attribute bestaat al",
			"required" => ":attribute is nog leeg"
		]);

		$category = new Category();
		$category->name = Input::get("name");
		$category->save();
		return redirect()->route("admin_categories_home",["id" => $category->id]);
	}
	public function edit($categoryId) {
		$category = Category::findOrFail($categoryId);
		return view("admin.category.edit",["category" => $category]);
	}
	public function update(Request $request , $categoryId) {
		$request->validate([
			"name" => "required|unique:category,name|max:255"
		],[
			"unique" => "De naam die u heeft ingevuld bestaat al",
			"required" => ":attribute is nog leeg"
		]);
		$category = Category::findOrFail($categoryId);
		$category->name = Input::get("name");
		$category->save();
		return redirect()->route("admin_categories_home");
	}
	public function delete($productId) {
		$product = Category::findOrFail($productId);
		$product->delete();
		return back();
	}
}
