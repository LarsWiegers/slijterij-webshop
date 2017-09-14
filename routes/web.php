<?php
Route::get('/', "HomeController@index");

Auth::routes();

Route::get("/not_allowed","NotAllowedController@index")->name("not_allowed");

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/age_verification', 'AgeVerificationController@index')->name('age_verification');
Route::get('/age_verification/{boolean}', 'AgeVerificationController@validation')->name('age_verification_result');
Route::get('/age_restriction_false', 'AgeVerificationController@age_restriction_false')->name('age_restriction_result_false');

Route::POST("/add_to_cart/{productId}","CartController@addToCart")->name("add_to_cart");
Route::get("/remove_all_checkout_items","CartController@removeAll")->name("remove_all_checkout_items");
Route::POST("/remove_one_item/{productId}","CartController@removeOne")->name("remove_an_item");

Route::get("/order_checkout","OrderCheckoutController@index")->name("order_checkout");

Route::group( [ 'prefix' => 'categories' ], function () {
	Route::get("/","CategoriesController@index")->name("categories_home");
	Route::POST("/","CategoriesController@filter")->name("set_category_criteria");
});
Route::get("/product","ProductController@index")->name("product_home");

Route::get("/profile","ProfileController@index")->name("profile");

Route::group(["prefix" => "admin","middleware" => ["auth","admin"]],function(){
	Route::get("/","Admin\AdminController@index")->name("admin_home");
	Route::get("/products/","Admin\ProductController@index")->name("admin_products_home");
	Route::get("/products/add/","Admin\ProductController@add")->name("admin_products_add");
	Route::POST("/products/make/","Admin\ProductController@make")->name("admin_products_make");
	Route::get("/products/edit/{id}","Admin\ProductController@edit")->name("admin_products_edit");
});
Route::get("/product/{productname}","ProductController@searchProduct")->name("product_single");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::POST("/sign_up","sigUpController@index")->name("sign_up_url");
