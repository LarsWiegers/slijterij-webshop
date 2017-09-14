<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	protected $fillable = ["category_id"];
	public $timestamps = false;
	public $productImages;

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->productImages = $this->getProductImages();
	}

	/**
	 *
	 *
	 *
	 * @param       none
	 * @return      A collection instance of which the items are ProductImage objects
	 *
	 */
	public function getProductImages() {
		return (new ProductImage())->where("product_id","=",$this->id)->get();
	}
}
