<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create("orders_rows",function(Blueprint $table) {
		    $table->increments('id');
		    $table->integer("product_id")->unsigned();
		    $table->integer("order_id")->unsigned();
		    $table->string("name");
		    $table->double("price");
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
	    Schema::dropIfExists("orders_rows");
    }
}
