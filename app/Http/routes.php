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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//For option page
Route::get('option','System\OptionController@index');
Route::get('option/create','System\OptionController@create');
Route::post('option/store','System\OptionController@store');

//For category
Route::get('category','Category\CategoryController@index');
Route::get('category/create','Category\CategoryController@create');
Route::post('category/store','Category\CategoryController@store');


// Route::resource('option', 'System\OptionController');


// Database ==
// Route::get('datatables','DatatablesController@getIndex');
// Route::get('datatables/data','DatatablesController@anydata');
Route::controller('datatables', 'DatatablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);