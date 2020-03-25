<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => 'auth:api'], function(){
	Route::get('/suppliers', 'SupplierController@index');
	Route::post('/suppliers/create', 'SupplierController@create');
	Route::get('/suppliers/{id}', 'SupplierController@show');
	Route::post('/suppliers/{id}/edit', 'SupplierController@edit');
	Route::post('/suppliers/{id}/delete', 'SupplierController@destroy');  //should delete all supplierconnected data.
//supplierProducts api routes
	Route::get('/supplierProducts', 'SupplierProductController@getAll');
	Route::get('/suppliers/{suppliers_id}/supplierProducts', 'SupplierProductController@index');
	Route::post('/suppliers/{suppliers_id}/supplierProducts/create', 'SupplierProductController@create');
	Route::get('/suppliers/{suppliers_id}/supplierProducts/{id}', 'SupplierProductController@show');
	Route::post('/suppliers/{suppliers_id}/supplierProducts/{id}/edit', 'SupplierProductController@edit');
	Route::post('/suppliers/supplierProducts/{id}/delete', 'SupplierProductController@destroy');
// //Products api routes	
	Route::get('/products', 'ProductController@index');
	Route::post('/products/create', 'ProductController@create');
	Route::get('/products/{id}', 'ProductController@show');
	Route::post('/products/{id}/edit', 'ProductController@edit');
	Route::post('/products/{id}/delete', 'ProductController@destroy');
// ////Orders api routes
	Route::get('/orders', 'OrderController@index');
	Route::post('/orders/create', 'OrderController@create');
	Route::get('/orders/{id}', 'OrderController@show');
	Route::post('/orders/{id}/edit', 'OrderController@edit');
	Route::post('/orders/{id}/delete', 'OrderController@destroy');
// ////Orders_details api routes
	Route::get('/orderDetails', 'OrderDetailController@getAll');
	Route::get('/order/{order_id}/orderdetails', 'OrderDetailController@index');
	Route::post('/order/{order_id}/orderdetails/create', 'OrderDetailController@create');
	Route::get('/order/{order_id}/orderdetails/{id}', 'OrderDetailController@show');
	Route::post('/order/{order_id}/orderdetails/{id}/edit', 'OrderDetailController@edit');
	Route::post('/order/{order_id}/orderdetails/{id}/delete', 'OrderDetailController@destroy');
	Route::get('/logout', 'AuthController@logoutApi');

	Route::get('/users/{token_id}', 'AuthController@getUser');

	});
// 

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');