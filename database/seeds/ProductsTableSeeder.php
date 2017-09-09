<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $totalCategories;
    public function run()
    {
    	$this->totalCategories = Category::count();
    	$faker = Faker::create();
    	$minPrice = 5.00;
    	$maxPrice = 500.00;
	    foreach (range(1,10) as $index) {
		    DB::table( "products" )->insert([
			    "category_id" => floor( rand( 1, $this->totalCategories ) ),
			    "online" => $faker->boolean(),
			    "name" => $faker->name(),
			    "description" => $faker->realText(),
			    "code" => $faker->bankAccountNumber,
			    "price" => rand ($minPrice  , $maxPrice ),
			    "quantity" => rand (500  , 10000 )
		    ]);
	    }
    }
}
