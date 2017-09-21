<?php
/*
 *   Routes that go to the homepage
 */
Route::get('/', "HomeController@index");
Route::get('/home', 'HomeController@index')->name('home');
/*
 *   Authentication routes for login / register / reset password
 *   And if a normal user goes to the page they are not allowed
 *   on we display the not allowed route.
*/
Auth::routes();
Route::get("/not_allowed","NotAllowedController@index")->name("not_allowed");
/*
 *   Age validation
 */
Route::group(["prefix" => "age_verification"],function() {
	Route::get('/', 'AgeVerificationController@index')->name('age_verification');
	Route::get('/{boolean}', 'AgeVerificationController@validation')->name('age_verification_result');
	Route::get('/age_restriction_false', 'AgeVerificationController@age_restriction_false')->name('age_restriction_result_false');
});
/*
 *   Shopping cart routes
 */
Route::POST("/add_to_cart/{productId}","CartController@addToCart")->name("add_to_cart");
Route::get("/remove_all_checkout_items","CartController@removeAll")->name("remove_all_checkout_items");
Route::POST("/remove_one_item/{productId}","CartController@removeOne")->name("remove_an_item");

/*
 *   place order / checkout routes
 */
Route::group(["prefix" => "order_checkout"],function(){
	Route::get("/","OrderCheckoutController@index")->name("order_checkout");
	Route::get("/step_2","OrderCheckoutController@billing")->name("order_checkout_step_2");
	Route::get("/step_3","OrderCheckoutController@final")->name("order_checkout_step_3");
});

/*
 * Display filters / categories
 */
Route::group( [ 'prefix' => 'category' ], function () {
	Route::get("/","CategoriesController@index")->name("categories_home");
	Route::POST("/","CategoriesController@filter")->name("set_category_criteria");
});
/*
 *   Display the product requested
*/
Route::get("/product/{productname}","ProductController@searchProduct")->name("product_single");

Route::get("/profile","ProfileController@index")->name("profile");
/*
 *   All the admin routes
 */
Route::group(["prefix" => "admin","middleware" => ["auth","admin"]],function(){
	Route::get("/","Admin\AdminController@index")->name("admin_home");
	Route::group(["prefix" => "products"],function(){
		Route::get("/","Admin\ProductController@index")->name("admin_products_home");
		Route::get("/add/","Admin\ProductController@add")->name("admin_products_add");
		Route::POST("/make/","Admin\ProductController@make")->name("admin_products_make");
		Route::get("/edit/{id}","Admin\ProductController@edit")->name("admin_products_edit");
		Route::get("/delete/{id}","Admin\ProductController@delete")->name("admin_products_delete");
	});
	Route::group(["prefix" => "categories"],function(){
		Route::get("/","Admin\CategoriesController@index")->name("admin_categories_home");
		Route::get("/add/","Admin\CategoriesController@add")->name("admin_categories_add");
		Route::POST("/make/","Admin\CategoriesController@make")->name("admin_categories_make");
		Route::get("/edit/{id}","Admin\CategoriesController@edit")->name("admin_categories_edit");
		Route::POST("/update/{id}","Admin\CategoriesController@update")->name("admin_categories_update");
		Route::get("/delete/{id}","Admin\CategoriesController@delete")->name("admin_categories_delete");
	});
	Route::group(["prefix" => "users"],function(){
		Route::get("/","Admin\UsersController@index")->name("admin_users_home");
	});

});

/*
 *   to sign up route
 */
Route::POST("/sign_up","Mail\MailListController@addUser")->name("sign_up_url");
