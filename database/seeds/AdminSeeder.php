<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    User::create([
		    'first_name' => "Lars",
		    'last_name' => "Wiegers",
		    'address' => "Laan van MensenRechten 500",
		    'postcode' => "7331 VZ",
		    'city' => "Apeldoorn",
		    'country' => "The Netherlands",
		    'telephone_number' => '06-55911836',
		    'email' => "larswiegerstest@gmail.com",
		    'role_id' => 2,
		    'password' => bcrypt("larswiegerstest"),
	    ]);
    }
}
