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

Route::get('/', 'HomeController@getIndex');


Route::group(array('before' => 'auth'), function()
{
	Route::get('admin', '\Controllers\Admin\DashboardController@getIndex');
});
Route::controller('home', 'HomeController');
Route::get('article', 'ArticleController@getIndex');
Route::get('article/{seoUrl}', 'ArticleController@getDetail');
Route::controller('contact', 'ContactController');
Route::get('/{seoUrl}', 'ContentController@getIndex');

//Admin
Route::group(array('before' => 'auth'), function()
{	
	Route::controller('admin/dashboard', '\Controllers\Admin\DashboardController');
	Route::controller('admin/logout', '\Controllers\Admin\LogoutController');
	Route::controller('admin/site', '\Controllers\Admin\SiteController');
	Route::controller('admin/menu', '\Controllers\Admin\MenuController');
	Route::controller('admin/content', '\Controllers\Admin\ContentController');
	Route::controller('admin/article', '\Controllers\Admin\ArticleController');
});

Route::controller('admin/login', '\Controllers\Admin\LoginController');

