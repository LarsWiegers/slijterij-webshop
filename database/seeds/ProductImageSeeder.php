<?php

use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    for($i = 1; $i <= Product::count() ; $i++) {
	    	DB::table("productimages")->insert([
	    		"location" => "productimages/default.png",
			    "alt" => "Default product image",
			    "product_id" => $i
		    ]);
	    }
    }
}
