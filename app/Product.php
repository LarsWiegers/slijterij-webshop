<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	protected $fillable = ["category_id"];

	public function getProductImages() {
		return (new ProductImage())->where("product_id","=",$this->id)->get();
	}
}
