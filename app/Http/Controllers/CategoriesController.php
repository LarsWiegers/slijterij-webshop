<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CategoriesController extends Controller
{
    //
	public function index() {
		$products = Product::get()->take(10);

		foreach($products as $product) {
			$product->productImage = $product->getProductImages();
		}
		return view("categories.index",[
			"products" => $products,
			"allCategories" => Category::all(),
			"lowestPrice" => $this->getLowestPrice(Product::all()),
			"highestPrice" => $this->getHighestPrice(Product::all()),
			"lowestQuantity" => $this->getLowestQuantity(Product::all()),
			"highestQuantity" => $this->getHighestQuantity(Product::all()),
		]);
	}
	public function filter() {
		$categoriesIdsToFilterBy = new Collection();
		foreach(Input::all() as $key => $input) {
			if(str_contains($key,"category-")) {
				$categoriesIdsToFilterBy->push($input);
			}
		}

		$price = Input::get('price');
		$price = str_replace(env("CURRENCY_ICON"),"",$price);
		$price = str_replace(" -","",$price);
		$price = explode(" ",$price);
		$chosenLowestPrice = $price[0];
		$chosenHighestPrice = $price[1];

		$quantity = Input::get('quantity');
		$quantity = str_replace("ml","",$quantity);
		$quantity = str_replace(" -","",$quantity);
		$quantity = explode(" ",$quantity);
		$chosenLowestQuantity = $quantity[0];
		$chosenHighestQuantity = $quantity[1];
		$productsIds = DB::table('products')
		    ->whereBetween('price', [$chosenLowestPrice, $chosenHighestPrice])
		    ->whereBetween('quantity',[$chosenLowestQuantity, $chosenHighestQuantity])
			->whereIn('category_id',$categoriesIdsToFilterBy)->get();
		$products = new Collection();
		foreach($productsIds as $result) {

			$product = (new Product())->find($result->id);
			$product->productImage = $product->getProductImages();

			$products->push($product);
		}
		return view("categories.index",[
			"products" => $products,
			"allCategories" => Category::all(),
			"lowestPrice" => $this->getLowestPrice(Product::all()),
			"highestPrice" => $this->getHighestPrice(Product::all()),
			"lowestQuantity" => $this->getLowestQuantity(Product::all()),
			"highestQuantity" => $this->getHighestQuantity(Product::all()),
			"checkboxesToBeChecked" => $categoriesIdsToFilterBy,
			"chosenLowestPrice" => $chosenLowestPrice,
			"chosenHighestPrice" => $chosenHighestPrice,
			"chosenLowestQuantity" => $chosenLowestQuantity,
			"chosenHighestQuantity" => $chosenHighestQuantity,
		]);
	}
	private function getLowestPrice($products) {
		$lowestPrice = 0;
		foreach($products as $product) {
			if($product->price <= $lowestPrice OR $lowestPrice === 0) {
				$lowestPrice = $product->price;
			}
		}
		return $lowestPrice;
	}
	private function getHighestPrice($products) {
		$highestPrice = 0;
		foreach($products as $product) {
			if($product->price >= $highestPrice OR $highestPrice === 0) {
				$highestPrice = $product->price;
			}
		}
		return $highestPrice;
	}
	private function getLowestQuantity($products) {
		$lowestQuantity = 0;
		foreach($products as $product) {
			if($product->quantity <= $lowestQuantity OR $lowestQuantity === 0) {
				$lowestQuantity = $product->quantity;
			}
		}
		return $lowestQuantity;
	}
	private function getHighestQuantity($products) {
		$highestQuantity = 0;
		foreach($products as $product) {
			if($product->quantity >= $highestQuantity OR $highestQuantity === 0) {
				$highestQuantity = $product->quantity;
			}
		}
		return $highestQuantity;
	}
}
