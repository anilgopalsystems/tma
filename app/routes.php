<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('hello');
	/*$assets = Assets::all()->first();
	echo $assets->asset_name.'<br>';
	echo $assets->user->firstname.'<br>';
	echo $assets->cat->name.'<br>';*/
	//var_dump(DB::table('assets')->lists('asset_name'));
});

Route::controller('login', 'LoginController');

Route::controller('dashboard', 'DashboardController');

Route::any('assets/getassetkeys/{id}','AssetsController@getassetkeys');
Route::any('assets/getassetkey','AssetsController@getassetkey');
Route::any('assets/str','AssetsController@generateRandomString');
Route::any('assets/udf','AssetsController@udf');
Route::any('assets/udfvalues','AssetsController@udfvalues');
Route::any('assets/getstorelist','AssetsController@getstorelist');
Route::any('assets/delete/{id}','AssetsController@delete');
Route::resource('myassets', 'AssetsController');

Route::any('assetgroups/delete/{id}', 'AssetgroupsController@delete');
Route::resource('assetgroups', 'AssetgroupsController');

Route::any('locations/delete/{id}', 'LocationController@delete');
Route::any('locations/createlocation', 'LocationController@createlocation');
Route::resource('locations', 'LocationController');

Route::resource('departments', 'DepartmentsController');

Route::any('stores/delete/{id}', 'StoresController@delete');
Route::any('stores/createstore', 'StoresController@createstore');
Route::resource('stores', 'StoresController');

Route::any('users/delete/{id}', 'UsersController@delete');
Route::resource('users', 'UsersController');

Route::any('usersgroup/delete/{id}', 'UsersgroupController@delete');
Route::resource('usersgroup', 'UsersgroupController');

Route::controller('grn', 'GrnController');

Route::controller('vendor', 'VendorController');

Route::get('mytest', 'hello\abc\AssetsController@hello');

// testing routes
/*Route::get('login', function()
{
	return View::make('common.login');
});*/
Route::get('myassetsdemo', function()
{
	return View::make('assets.assets');
});

Route::get('testing/{id}', 'AssetsController@testing');