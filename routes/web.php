<?php
Route::get('/', "HomeController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/age_verification', 'AgeVerificationController@index')->name('age_verification');
Route::get('/age_verification/{boolean}', 'AgeVerificationController@validation')->name('age_verification_result');
Route::get('/age_restriction_false', 'AgeVerificationController@age_restriction_false')->name('age_restriction_result_false');

Route::get("/order_checkout","OrderCheckout@index")->name("order_checkout");
