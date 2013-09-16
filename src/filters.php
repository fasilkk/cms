<?php

Route::filter('pongo.guest', function() {

	if (Auth::check())	{
		return Redirect::route('dashboard');
	}

});

Route::filter('pongo.auth', function() {

	if (Auth::guest())	{

		Alert::error(t('alert.error.unauthorized'))->flash();

		return Redirect::route('login.index');
	}

});

Route::filter('pongo.auth.api', function() {

	if (Auth::guest())	{

		$msg = t('alert.error.session_exp');

		Alert::error($msg)->flash();

		return json_encode(
			array(
				'status' => 'error',
				'type' => 'expired'
			)
		);

	}

});