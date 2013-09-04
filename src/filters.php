<?php

Route::filter('pongo.guest', function() {

	if (Auth::check())	{
		return Redirect::route('dashboard.index');
	}

});

Route::filter('pongo.auth', function() {

	if (Auth::guest())	{

		Alert::error(t('alert.error.unauthorized'))->flash();

		return Redirect::route('login.index');
	}

});