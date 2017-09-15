<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('datum');
            $table->boolean('status');
            $table->double('price');
	        $table->string('first_name');
	        $table->string('last_name');
	        $table->string('address');
	        $table->string('postcode');
	        $table->string('city');
	        $table->string('country');
	        $table->string('telephone_number');
	        $table->string('email');
            $table->string('order_first_name');
            $table->string('order_last_name');
            $table->string('order_address');
            $table->string('order_postcode');
            $table->string('order_city');
            $table->string('order_country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
