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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::group(['middleware' => 'auth:api'], function(){
// 	Route::get('/suppliers', 'SupplierController@index');
// 	Route::get('/suppliers/create', 'SupplierController@create');
// 	Route::get('/suppliers/{id}', 'SupplierController@show');
// 	Route::post('/suppliers/{id}/edit', 'SupplierController@edit');
// 	Route::post('/suppliers/{id}/delete', 'SupplierController@destroy');  //should delete all supplierconnected data.
// //Supplier_products api routes
// 	Route::get('/suppliers_products', 'SupplierProductController@getAll');
// 	Route::get('/suppliers_products/create', 'SupplierProductController@create');
// 	Route::get('/supplier/{id}/supplier_products', 'SupplierProductController@index');
// 	Route::get('/supplier/{id}|/supplier_products/{id}', 'SupplierProductController@show');
// 	Route::post('/supplier/{id}/supplier_products/{id}/edit', 'SupplierProductController@edit');
// 	Route::post('/supplier/{id}/supplier_products/{id}/delete', 'SupplierProductController@destroy');
// //Products api routes	
// 	Route::get('/products', 'ProductController@index');
// 	Route::get('/products/create', 'ProductController@create');
// 	Route::get('/products/{id}', 'ProductController@show');
// 	Route::post('/product/{id}/edit', 'ProductController@edit');
// 	Route::post('/product/{id}/delete', 'ProductController@destroy');
// ////Orders api routes
// 	Route::get('/order', 'OrderController@index');
// 	Route::get('/order/create', 'OrderController@create');
// 	Route::get('/order/{id}', 'OrderController@show');
// 	Route::post('/order/{id}/edit', 'OrderController@edit');
// 	Route::post('/questions/{id}/delete', 'OrderController@destroy');
// ////Orders_details api routes
// 	Route::get('/order_details', 'OrderDetailController@getAll');
// 	Route::get('/order/{id}/order_details', 'OrderDetailController@index');
// 	Route::get('/order/{id}/order_details/{id}', 'OrderDetailController@show');
// 	Route::post('/order/{id}/order_details/{id}/edit', 'OrderDetailController@edit');
// 	Route::post('/order/{id}/order_details/{id}/edit', 'OrderDetailController@destroy');
// 	});


// Route::post('login', 'AuthController@login');
// Route::post('register', 'AuthController@register');