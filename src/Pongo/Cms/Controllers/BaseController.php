<?php namespace Pongo\Cms\Controllers;

use Auth, Alert, Controller, Pongo, Redirect;

class BaseController extends Controller {

	public function __construct()
	{
		
	}

	public function logout()
	{
		Auth::logout();

		Alert::info(t('alert.info.logout'))->flash();

		return Redirect::route('login.index');
	}

}