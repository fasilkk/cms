<?php namespace Pongo\Cms\Controllers;

use Auth, Alert, Controller, Redirect, Render, Response;

class BaseController extends Controller {

	public function __construct()
	{
		
	}

	public function bootstrap()
	{
		$contents = Render::view('partials.bootstrap');

		$response = Response::make($contents, 200);

		$response->header('Content-Type', 'application/javascript');

		return $response;
	}

	/**
	 * Log the user out
	 * 
	 * @return void
	 */
	public function logout()
	{
		Auth::logout();

		Alert::info(t('alert.info.logout'))->flash();

		return Redirect::route('login.index');
	}

}