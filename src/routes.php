<?php

// Set controllers path shortcut

$pongoControllers = 'Pongo\Cms\Controllers\\';

// Front-end routes

/*Route::group(Config::get('cms::routes.site_group_routes'), function() use ($pongoControllers)
{

});*/

// Back-end routes

Route::group(Config::get('cms::routes.cms_group_routes'), function() use ($pongoControllers)
{

	Route::get('/', array('uses' => $pongoControllers.'DashboardController@index', 'as' => 'pongo.dashboard.index'));
	// Route::get('logout', array('uses' => $pongoControllers.'LoginController@destroy', 'as' => 'wardrobe.admin.logout'));
	// Route::get('login', array('uses' => $pongoControllers.'LoginController@create', 'as' => 'wardrobe.admin.login'));
	// Route::post('login', array('uses' => $pongoControllers.'LoginController@store'));

});

// Handles 404 - Not found

App::missing(function($exception)
{
	return Response::view('cms::errors.404', array('error' => $exception), 404);
});