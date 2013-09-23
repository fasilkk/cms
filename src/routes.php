<?php

// Set controllers path shortcut

$pongoControllers = 'Pongo\Cms\Controllers\\';
$apiControllers = 'Pongo\Cms\Controllers\Api\\';

// Back-end routes

Route::group(Config::get('cms::routes.cms_group_routes'), function() use ($pongoControllers)
{

	// JS BOOTSTRAP
	Route::get('bootstrap.js', array('uses' => $pongoControllers.'BaseController@bootstrap', 'as' => 'js.bootstrap'));

	// LOGIN
	Route::get('/', array('uses' => $pongoControllers.'LoginController@index', 'as' => 'cms.index'));
	Route::get('login', array('uses' => $pongoControllers.'LoginController@index', 'as' => 'login.index'));
	Route::post('login', array('uses' => $pongoControllers.'LoginController@login', 'as' => 'post.login'));
	Route::get('logout', array('uses' => $pongoControllers.'BaseController@logout', 'as' => 'logout'));

	// DASHBOARD
	Route::get('dashboard', array('uses' => $pongoControllers.'DashboardController@showDashboard', 'as' => 'dashboard'));

	// PAGE
	Route::get('page/settings/{id}', array('uses' => $pongoControllers.'PageController@settingsPage', 'as' => 'page.settings'));
	Route::get('page/layout/{id}', array('uses' => $pongoControllers.'PageController@layoutPage', 'as' => 'page.layout'));
	Route::get('page/seo/{id}', array('uses' => $pongoControllers.'PageController@seoPage', 'as' => 'page.seo'));
	Route::get('page/media/{id}', array('uses' => $pongoControllers.'PageController@mediaPage', 'as' => 'page.media'));
	Route::get('page/link/{id}', array('uses' => $pongoControllers.'PageController@linkPage', 'as' => 'page.link'));
	Route::get('page/deleted', array('uses' => $pongoControllers.'PageController@deletedPage', 'as' => 'page.deleted'));

	// ELEMENT
	Route::get('element/edit/{id}', array('uses' => $pongoControllers.'ElementController@editElement', 'as' => 'element.edit'));

});

// API calls

Route::group(Config::get('cms::routes.api_group_routes'), function() use ($apiControllers)
{

	// SAVE
	Route::any('save', array('uses' => $apiControllers.'SaveController@save', 'as' => 'api.save'));
	Route::any('error', array('uses' => $apiControllers.'SaveController@error', 'as' => 'api.error'));
	Route::any('expire', array('uses' => $apiControllers.'SaveController@expire', 'as' => 'api.expire'));

	// PAGE
	Route::any('page/create', array('uses' => $apiControllers.'PageController@createPage', 'as' => 'api.page.create'));
	Route::any('page/lang', array('uses' => $apiControllers.'PageController@changeLang', 'as' => 'api.page.lang'));
	Route::any('page/order', array('uses' => $apiControllers.'PageController@orderPages', 'as' => 'api.page.order'));

		// SETTINGS
		Route::any('page/settings/save', array('uses' => $apiControllers.'PageController@pageSettingsSave', 'as' => 'api.page.settings.save'));
		Route::any('page/settings/clone', array('uses' => $apiControllers.'PageController@pageSettingsClone', 'as' => 'api.page.settings.clone'));
		Route::any('page/settings/delete', array('uses' => $apiControllers.'PageController@pageSettingsDelete', 'as' => 'api.page.settings.delete'));
	

	// ELEMENT
	Route::any('element/order', array('uses' => $apiControllers.'ElementController@orderElements', 'as' => 'api.element.order'));
	Route::any('element/create', array('uses' => $apiControllers.'ElementController@createElement', 'as' => 'api.element.create'));

});


// Front-end routes

Route::group(Config::get('cms::routes.site_group_routes'), function() use ($pongoControllers)
{
	
	Route::any('{all}', array('uses' => $pongoControllers.'SiteController@renderPage', 'as' => 'catchall'))->where('all', '.*');

});

// Handles 404 - Not found

App::missing(function($exception)
{
	return Response::view('cms::errors.404', array('error' => $exception), 404);
});
