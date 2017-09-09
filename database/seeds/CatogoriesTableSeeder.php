<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatogoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::table("categories")->insert([
		    "name" => "Bier"
	    ]);
	    DB::table("categories")->insert([
		    "name" => "Wijn"
	    ]);
	    DB::table("categories")->insert([
		    "name" => "Whiskey"
	    ]);
	    DB::table("categories")->insert([
		    "name" => "Shooter"
	    ]);
	    DB::table("categories")->insert([
		    "name" => "Alcoholpop"
	    ]);
	    DB::table("categories")->insert([
		    "name" => "Likeur"
	    ]);
	    DB::table("categories")->insert([
		    "name" => "Rum"
	    ]);
    }
}
