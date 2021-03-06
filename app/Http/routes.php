<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');


Route::get('report', 'ReportController@index');
Route::get('report/data', 'ReportController@data');
Route::get('report/data/{year}', 'ReportController@data');

Route::resource('api_category', 'ApiCategoryController');
Route::resource('api_transaction', 'ApiTransactionController');
Route::resource('import', 'ImportController');

Route::resource('category', 'CategoryController');
Route::resource('transaction', 'TransactionController');
Route::get('api_category/sub_categories/{id}', 'ApiCategoryController@getSubCategories');
Route::get('category/{id}/{mount}/{year}', 'CategoryController@show');
Route::get('/{mount}/{year}', 'HomeController@index');
