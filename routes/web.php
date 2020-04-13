<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ShopController@index');

Route::get('/contact', 'ShopController@getContact');

Route::get('/blog', 'ShopController@getBlog');

Route::get('/singleBlog', 'ShopController@getSingleBlog');

Route::get('/login', 'ShopController@getLogin');

Route::get('/tracking', 'ShopController@getTracking');

Route::get('/elements', 'ShopController@getElements');

Route::get('/category', 'CategoryController@getCategory');

Route::get ('/category/{categoryId}', 'CategoryController@choosenCategory');

Route::get('/product/{productId}', 'ShopController@productAction');

Route::get('/checkout', 'ShopController@getCheckout');

Route::get('/cart', 'ShopController@getCart');

Route::get('/confirmation', 'ShopController@getConfirmation');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/ajax', 'AjaxController@brandAndColor');

Route::post('/ajaxShow', 'AjaxController@show');

Route::post('/ajaxCart', 'AjaxController@cart');

Route::post('/ajaxSlider', 'AjaxController@priceSlider');

Route::get('/rangePrice', 'AjaxController@rangePrices');

Route::post('/ajaxSort', 'AjaxController@sorting');

Route::post('/ajaxLeaveReview', 'AjaxController@leaveReview');

Route::post('/ajaxFeedbackReply', 'AjaxController@feedbackReply');
 
Route::get('/search','SearchController@search');
 
Route::get('/product/{id}','SearchController@viewProduct');
 
Route::post('/find','SearchController@find');
