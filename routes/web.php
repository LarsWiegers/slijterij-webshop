<?php
Route::get('/', "HomeController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/age_verification', 'AgeVerificationController@index')->name('age_verification');
Route::get('/age_verification/{boolean}', 'AgeVerificationController@validation')->name('age_verification_result');
Route::get('/age_restriction_false', 'AgeVerificationController@age_restriction_false')->name('age_restriction_result_false');

Route::POST("/add_to_cart/{productId}/{returnUrl?}","CartController@addToCart")->name("add_to_cart");
Route::get("/remove_all_checkout_items/{returnUrl?}","CartController@removeAll")->name("remove_all_checkout_items");
Route::POST("/remove_one_item/{productId}/{returnUrl?}","CartController@removeOne")->name("remove_an_item");

Route::get("/order_checkout","OrderCheckout@index")->name("order_checkout");

Route::group( [ 'prefix' => 'categories' ], function () {
	Route::get("/","CategoriesController@index")->name("categories_home");
	Route::POST("/","CategoriesController@filter")->name("set_category_criteria");
});
Route::get("/product","ProductController@index")->name("product_home");
