<?php
Route::get('/', "HomeController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/age_verification', 'AgeVerificationController@index')->name('age_verification');
Route::get('/age_verification/{boolean}', 'AgeVerificationController@validation')->name('age_verification_result');
Route::get('/age_restriction_false', 'AgeVerificationController@age_restriction_false')->name('age_restriction_result_false');

Route::get("/add_to_cart","CartController@index")->name("add_to_cart");
Route::get("/remove_all_checkout_items/{returnUrl?}","CartController@remove_all")->name("remove_all_checkout_items");

Route::get("/order_checkout","OrderCheckout@index")->name("order_checkout");
Route::get("/categories","CategoriesController@index")->name("categories_home");
Route::get("/product","ProductController@index")->name("product_home");
