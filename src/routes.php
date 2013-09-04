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

	// LOGIN
	Route::get('/', array('uses' => $pongoControllers.'LoginController@index', 'as' => 'cms.index'));
	Route::get('login', array('uses' => $pongoControllers.'LoginController@index', 'as' => 'login.index'));
	Route::post('login', array('uses' => $pongoControllers.'LoginController@login', 'as' => 'post.login'));
	Route::get('logout', array('uses' => $pongoControllers.'BaseController@logout', 'as' => 'logout'));

	// DASHBOARD
	Route::get('dashboard', array('uses' => $pongoControllers.'DashboardController@index', 'as' => 'dashboard.index'));


});

// Handles 404 - Not found

App::missing(function($exception)
{
	return Response::view('cms::errors.404', array('error' => $exception), 404);
});